<?php

namespace App\Listeners;

use Tecnogo\LaravelMeliSdk\Events\AccessTokenReceived;

/**
 * Class StoreMercadolibreAccessTokenInSession
 *
 * @package App\Listeners
 */
final class StoreMercadolibreAccessTokenInSession
{
    public function handle(AccessTokenReceived $event)
    {
        request()->session()->put('access_token', $event->getAccessToken()->get());
    }
}
