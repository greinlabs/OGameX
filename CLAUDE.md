# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

OGameX: a Laravel 13 / PHP 8.5 re-implementation of the OGame browser game. Autoload root `OGame\` maps to `app/`. Tests are Pest (on top of PHPUnit 13).

## Commands

The app runs in Docker. The `ogamex-app` container is the PHP environment; run PHP tooling through it.

```bash
docker compose up -d                                   # start app, db, nginx, scheduler, queue worker, reverb
docker compose exec ogamex-app composer run tests      # full suite: ./vendor/bin/pest --parallel
docker compose exec ogamex-app ./vendor/bin/pest --filter=MissileAttackFeatureTest   # single test by name
docker compose exec ogamex-app ./vendor/bin/pest tests/Feature/FleetMovementTest.php # single file
docker compose exec ogamex-app composer run cs         # Pint auto-fix (use `-- --test` to check only)
docker compose exec ogamex-app composer run stan       # PHPStan (larastan)
docker compose exec ogamex-app composer run rector     # Rector
npm run dev                                            # Vite dev server (run on host)
npm run build                                          # builds public/build (committed)
```

CI shards the Pest suite 3 ways (`--shard=N/3 --parallel`) and runs four race-condition artisan commands (see below). Flaky-test investigation: `while php vendor/bin/phpunit --filter X --stop-on-failure; do echo; done` (see `docs/run-tests-in-loop-until-failure.md`).

Race-condition tests are artisan commands in `app/Console/Commands/Test/` that fire parallel requests. They are dev-only:
`php artisan ogamex:test:race-condition-game-mission` (also `-unitqueue`, `-unitqueue-creation`, `-fleet-dispatch`).

## Rust battle engine

Battles run in a Rust library loaded via PHP FFI, `storage/rust-libs/libbattle_engine_ffi.so`. The `php` engine is a fallback selected by the `battle_engine` setting (default `rust`, see `SettingsService::battleEngine()`).

- Rebuild after editing `rust/`: `./rust/compile.sh` from the repo root (the dev container entrypoint also runs it on start).
- Debug with a sample fleet: `cd rust && cargo run --release --package battle_engine_debug`.
- Compare engines: `php artisan ogamex:test:battle-engine-performance {php|rust} --fleet='{"attacker":{...},"defender":{...}}'`. (`rust/README.md` still shows the old `test:` prefix.)

## Architecture

**Two UI surfaces share one backend.** The "outgame" pages (login, landing) and the "ingame" game UI use separate Blade trees (`resources/views/outgame`, `resources/views/ingame`), separate JS/CSS bundles, and legacy jQuery code. `vite.config.js` concatenates the legacy jQuery-era scripts into fixed bundles (`ingameScripts` / `outgameScripts` lists) rather than bundling them as ES modules. Adding a new legacy script means adding it to those lists.

**Game state lives in the database, and missions resolve lazily.** There is no tick loop that moves fleets. On every authenticated ingame request, `app/Http/Middleware/GlobalGame.php` loads the `PlayerService`, updates player and planets, and then processes any arrived fleet missions via `FleetMissionService::updateMission()`. The scheduler and queue worker handle only periodic jobs (highscores, bots, cleanup, dark matter). Several `Services` (`PlayerService`, `PlanetService`) call `updateMission` too, so mission state can advance from more than one entry point.

**Players and planets are wrapped in service objects.** `PlayerService` and `PlanetService` are built through `PlayerServiceFactory` / `PlanetServiceFactory` and bound per request (the middleware swaps in the current player). Controllers and missions work through these services, not raw Eloquent models. `ObjectService` and the `app/GameObjects/` classes hold the static game data (buildings, research, ships, defense) and their properties.

**Fleet missions are a class hierarchy.** Each mission type is a `GameMission` subclass in `app/GameMissions/` (`AttackMission`, `EspionageMission`, `ExpeditionMission`, `TransportMission`, ...) that declares its static name, type ID, return-mission behavior, and speed type. `GameMissionFactory` builds them, and `FleetMissionService` creates and updates the `FleetMission` rows. Shared logic (returns, ACS unions, cancellation) lives in `GameMission` and `FleetMissionService`, so changes to one mission type can affect the others.

**Combat is a pluggable engine.** `app/GameMissions/BattleEngine/` has an abstract `BattleEngine` with a PHP and a Rust implementation. The shared battle logic (rounds, loot, moon chance, tactical retreat, defense repair) is in the base class and `Services/`. Battle inputs and outputs are the `Models/` classes (`AttackerFleet`, `DefenderFleet`, `BattleResult`, ...). Any change to combat rules probably needs matching changes in both engines and in `rust/battle_engine_ffi/src/lib.rs`, and the `BattleEngine` unit tests in `tests/Unit/BattleEngine/` cover both.

**Messages are typed.** Each in-game message is a class in `app/GameMessages/` (extending `GameMessage`), and `MessageService` sends them. Reports and messages reference planets, players, and fleets by ID, so deleting entities has side effects on message history.

**Bots and NPCs.** `BotService`, `BotCycleCommand` (every minute), and the `NPC*` services generate bot players and fleets. The admin area (`app/Http/Controllers/Admin/`) exposes their settings.

**Tests.** `tests/Feature` is HTTP and integration coverage, `tests/Unit` is isolated logic. `tests/Feature/FleetDispatch/` is a set of per-mission tests built on `FleetDispatchTestCase`, which extends `MoonTestCase`. Reusable helpers live in `tests/Traits/` (for example `ManagesPlanetState`, `SubmitsBuildRequests`). Pest's `tests/Pest.php` binds the `TestCase` base to `Feature` only.

## Environment

- `.env` is created from `.env.example` by the container entrypoint (`docker/entrypoint.sh`) if missing. `DB_HOST` is `ogamex-db` (MariaDB 11.3).
- `CONTAINER_ROLE` picks what the container runs: `app` (php-fpm, migrations), `scheduler`, `queue`, or `reverb`.
- CI fails if sources reference `gfsrv.net` (see `.github/actions/check-remote-sources`). Host assets locally.
