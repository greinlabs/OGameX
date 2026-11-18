<?php

namespace Tests\Feature;

use OGame\Factories\PlanetServiceFactory;
use OGame\Factories\PlayerServiceFactory;
use OGame\Models\Enums\PlanetType;
use OGame\Models\Planet;
use Tests\IsolatedAccountTestCase;

class AdminMoonGrantTest extends IsolatedAccountTestCase
{
    public function testAdminCanGrantMoonsToAnotherPlayerAndThemself(): void
    {
        $this->artisan('ogamex:admin:assign-role', ['username' => $this->currentUsername]);

        $targetUser = $this->createUser();
        $targetPlayer = resolve(PlayerServiceFactory::class)->make($targetUser->id, true);
        $targetPlanet = $targetPlayer->planets->current();

        $page = $this->get(route('admin.developershortcuts.index'));
        $page->assertOk()
            ->assertSee($targetUser->username)
            ->assertSee('value="' . $targetPlanet->getPlanetId() . '"', false)
            ->assertSee('value="' . $this->planetService->getPlanetId() . '"', false);

        $targetCoordinates = $targetPlanet->getPlanetCoordinates();
        $this->post(route('admin.developershortcuts.grant-moon'), [
            'planet_id' => $targetPlanet->getPlanetId(),
        ])->assertRedirect()->assertSessionHas('status');

        $this->assertDatabaseHas('planets', [
            'user_id' => $targetUser->id,
            'galaxy' => $targetCoordinates->galaxy,
            'system' => $targetCoordinates->system,
            'planet' => $targetCoordinates->position,
            'planet_type' => PlanetType::Moon->value,
        ]);

        $adminCoordinates = $this->planetService->getPlanetCoordinates();
        $this->post(route('admin.developershortcuts.grant-moon'), [
            'planet_id' => $this->planetService->getPlanetId(),
        ])->assertRedirect()->assertSessionHas('status');

        $this->assertDatabaseHas('planets', [
            'user_id' => $this->currentUserId,
            'galaxy' => $adminCoordinates->galaxy,
            'system' => $adminCoordinates->system,
            'planet' => $adminCoordinates->position,
            'planet_type' => PlanetType::Moon->value,
        ]);
    }

    public function testAdminCannotGrantASecondMoonToTheSamePlanet(): void
    {
        $this->artisan('ogamex:admin:assign-role', ['username' => $this->currentUsername]);
        resolve(PlanetServiceFactory::class)->createMoonForPlanet($this->planetService, 2_000_000, 20);

        $this->post(route('admin.developershortcuts.grant-moon'), [
            'planet_id' => $this->planetService->getPlanetId(),
        ])->assertRedirect()->assertSessionHas('error');

        $coordinates = $this->planetService->getPlanetCoordinates();
        $this->assertSame(1, Planet::query()
            ->where('galaxy', $coordinates->galaxy)
            ->where('system', $coordinates->system)
            ->where('planet', $coordinates->position)
            ->where('planet_type', PlanetType::Moon->value)
            ->count());
    }

    public function testNonAdminCannotGrantMoons(): void
    {
        $this->post(route('admin.developershortcuts.grant-moon'), [
            'planet_id' => $this->planetService->getPlanetId(),
        ])->assertRedirect('/overview');

        $this->assertDatabaseMissing('planets', [
            'user_id' => $this->currentUserId,
            'galaxy' => $this->planetService->getPlanetCoordinates()->galaxy,
            'system' => $this->planetService->getPlanetCoordinates()->system,
            'planet' => $this->planetService->getPlanetCoordinates()->position,
            'planet_type' => PlanetType::Moon->value,
        ]);
    }
}
