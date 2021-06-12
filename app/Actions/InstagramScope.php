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
            'facebook' => Socialite::driver($provider)->with(['scope'=>'instagram_graph_user_media,instagram_graph_user_profile,email,public_profile,instagram_basic'])->redirect(),
            'instagram' => Socialite::driver($provider)->with(['scope'=>'*'])->redirect(),
            default => Socialite::driver($provider)->redirect(),
        };
    }
}
