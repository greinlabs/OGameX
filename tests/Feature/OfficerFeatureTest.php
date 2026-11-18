<?php

namespace Tests\Feature;

use OGame\Enums\OfficerType;
use OGame\Factories\PlayerServiceFactory;
use OGame\Models\DarkMatterTransaction;
use OGame\Models\UserOfficer;
use OGame\Services\OfficerService;
use Tests\IsolatedAccountTestCase;

class OfficerFeatureTest extends IsolatedAccountTestCase
{
    public function test_officers_page_displays_available_officers(): void
    {
        $this->get(route('officers.index'))
            ->assertOk()
            ->assertSee('Geologist')
            ->assertSee('Dark Matter');
    }

    public function test_officer_purchase_debits_dark_matter_and_renewal_extends_expiration(): void
    {
        $user = $this->planetService->getPlayer()?->getUser();
        $this->assertNotNull($user);
        $user->dark_matter = OfficerService::COST * 2;
        $user->save();

        $this->post(route('officers.activate'), ['officer' => OfficerType::GEOLOGIST->value])
            ->assertRedirect();
        $this->post(route('officers.activate'), ['officer' => OfficerType::GEOLOGIST->value])
            ->assertRedirect();

        $user->refresh();
        $this->assertSame(0, $user->dark_matter);
        $this->assertSame(
            2,
            DarkMatterTransaction::forUser($user->id)->ofType('officer')->count()
        );

        $officer = UserOfficer::where('user_id', $user->id)
            ->where('officer', OfficerType::GEOLOGIST->value)
            ->firstOrFail();

        $this->assertSame(now()->addDays(OfficerService::DURATION_DAYS * 2)->timestamp, $officer->expires_at->timestamp);
    }

    public function test_officer_purchase_with_insufficient_dark_matter_changes_nothing(): void
    {
        $user = $this->planetService->getPlayer()?->getUser();
        $this->assertNotNull($user);
        $user->dark_matter = OfficerService::COST - 1;
        $user->save();

        $this->post(route('officers.activate'), ['officer' => OfficerType::ENGINEER->value])
            ->assertSessionHasErrors('officer');

        $user->refresh();
        $this->assertSame(OfficerService::COST - 1, $user->dark_matter);
        $this->assertDatabaseMissing('user_officers', [
            'user_id' => $user->id,
            'officer' => OfficerType::ENGINEER->value,
        ]);
        $this->assertDatabaseMissing('dark_matter_transactions', [
            'user_id' => $user->id,
            'type' => 'officer',
        ]);
    }

    public function test_expired_officers_do_not_grant_bonuses_and_all_active_officers_unlock_staff(): void
    {
        $user = $this->planetService->getPlayer()?->getUser();
        $this->assertNotNull($user);

        UserOfficer::create([
            'user_id' => $user->id,
            'officer' => OfficerType::GEOLOGIST->value,
            'expires_at' => now()->subSecond(),
        ]);

        $playerFactory = resolve(PlayerServiceFactory::class);
        $playerWithoutActiveOfficer = $playerFactory->make($user->id, true);
        $this->assertFalse($playerWithoutActiveOfficer->hasGeologist());
        $fleetSlotsWithoutAdmiral = $playerWithoutActiveOfficer->getFleetSlotsMax();
        $researchTimeWithoutTechnocrat = $playerWithoutActiveOfficer->planets->current()
            ->getTechnologyResearchTime('energy_technology');

        foreach (OfficerType::cases() as $officer) {
            UserOfficer::updateOrCreate(
                ['user_id' => $user->id, 'officer' => $officer->value],
                ['expires_at' => now()->addDays(1)]
            );
        }

        $player = $playerFactory->make($user->id, true);
        $this->assertTrue($player->hasCommander());
        $this->assertTrue($player->hasAdmiral());
        $this->assertTrue($player->hasEngineer());
        $this->assertTrue($player->hasGeologist());
        $this->assertTrue($player->hasTechnocrat());
        $this->assertTrue($player->hasCommandingStaff());
        $this->assertSame(
            $player->getResearchLevel('espionage_technology') + 2,
            $player->getEspionageLevel()
        );
        $this->assertSame($fleetSlotsWithoutAdmiral + 2, $player->getFleetSlotsMax());
        $this->assertEquals(
            (int)($researchTimeWithoutTechnocrat * 0.9),
            $player->planets->current()->getTechnologyResearchTime('energy_technology')
        );
    }
}
