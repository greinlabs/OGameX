<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use OGame\Http\Middleware\Locale;
use OGame\Models\User;
use Tests\IsolatedAccountTestCase;

/**
 * Verify language switching supports French and persists the selection.
 */
class LanguageSwitchTest extends IsolatedAccountTestCase
{
    /**
     * French must be registered as a supported application locale.
     */
    public function testFrenchIsSupportedLocale(): void
    {
        $this->assertContains('fr', Locale::SUPPORTED_LOCALES);
    }

    /**
     * Brazilian Portuguese must be registered as a supported application locale.
     */
    public function testBrazilianPortugueseIsSupportedLocale(): void
    {
        $this->assertContains('pt-BR', Locale::SUPPORTED_LOCALES);
    }

    /**
     * Switching language updates session, user preference, and French translations.
     */
    public function testSwitchToFrenchPersistsPreference(): void
    {
        $response = $this->get(route('language.switch', ['lang' => 'fr']));
        $response->assertRedirect();

        $this->assertSame('fr', session('locale'));

        $user = User::findOrFail($this->currentUserId);
        $this->assertSame('fr', $user->lang);

        App::setLocale('fr');
        $this->assertSame('Se connecter', __('t_external.login.btn'));
        $this->assertSame('Vue générale', __('t_overview.overview'));
    }

    /**
     * Switching to Brazilian Portuguese persists the locale and uses English fallback translations.
     */
    public function testSwitchToBrazilianPortuguesePersistsPreference(): void
    {
        $response = $this->get(route('language.switch', ['lang' => 'pt-BR']));
        $response->assertRedirect();

        $this->assertSame('pt-BR', session('locale'));

        $user = User::findOrFail($this->currentUserId);
        $this->assertSame('pt-BR', $user->lang);

        App::setLocale('pt-BR');
        $this->assertSame('Log in', __('t_external.login.submit'));
    }

    /**
     * Ingame layout exposes a French language switcher link.
     */
    public function testIngameLayoutShowsFrenchSwitcher(): void
    {
        $response = $this->get('/overview');
        $response->assertStatus(200);
        $response->assertSee(route('language.switch', ['lang' => 'fr']), false);
        $response->assertSee('>FR</a>', false);
    }

    /**
     * Both layouts expose the Brazilian Portuguese language switcher.
     */
    public function testLayoutsShowBrazilianPortugueseSwitcher(): void
    {
        $ingameResponse = $this->get('/overview');
        $ingameResponse->assertStatus(200);
        $ingameResponse->assertSee(route('language.switch', ['lang' => 'pt-BR']), false);
        $ingameResponse->assertSee('>PT-BR</a>', false);

        Auth::logout();

        $outgameResponse = $this->get(route('login'));
        $outgameResponse->assertStatus(200);
        $outgameResponse->assertSee(route('language.switch', ['lang' => 'pt-BR']), false);
        $outgameResponse->assertSee('>PT-BR</a>', false);
    }
}
