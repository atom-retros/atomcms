<?php

namespace App\Services;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use phpDocumentor\Reflection\Types\This;

class PaypalService
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     * For demo purpose, we are using SandboxEnvironment. In production this will be
     * ProductionEnvironment.
     */
    private function environment()
    {
        if (config('paypal.mode') === 'sandbox') {
            $clientId = config("paypal.sandbox.client_id") ?: "<<PAYPAL-CLIENT-ID>>";
            $clientSecret = config('paypal.sandbox.client_secret') ?: "<<PAYPAL-CLIENT-ID>>";

            return new SandboxEnvironment($clientId, $clientSecret);
        }

        $clientId = config('paypal.live.client_id') ?: "<<PAYPAL-CLIENT-ID>>";
        $clientSecret = config('paypal.live.client_secret') ?: "<<PAYPAL-CLIENT-ID>>";

        return new ProductionEnvironment($clientId, $clientSecret);
    }
}