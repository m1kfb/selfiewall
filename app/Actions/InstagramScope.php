<?php

namespace App\Actions;

use JoelButcher\Socialstream\Contracts\GeneratesProviderRedirect;
use Laravel\Socialite\Facades\Socialite;

class InstagramScope implements GeneratesProviderRedirect
{
    /**
     * Generates the redirect for a given provider.
     *
     * @param  string  $provider
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function generate(string $provider)
    {
        return match ($provider) {
            'instagram' => Socialite::driver($provider)->scope(['*'])->redirect(),
            default => Socialite::driver($provider)->redirect(),
        };
    }
}
