<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountTopupFormRequest;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function __construct(private PayPalClient $provider)
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('habbo.paypal'));
        $this->provider->getAccessToken();
    }

    public function process(AccountTopupFormRequest $request)
    {
        $orderData = [
            'intent' => 'CAPTURE',
            "application_context" => [
                "return_url" => route('paypal.successful-transaction'),
                "cancel_url" => route('paypal.cancelled-transaction'),
            ],
            'purchase_units' => [
                0 => [
                    'amount' => [
                        'currency_code' => config('habbo.paypal.currency'),
                        'value' => (string)$request->integer('amount')
                    ],
                ]
            ],
        ];

        $response = $this->provider->createOrder($orderData);

        if (array_key_exists('id', $response) && is_null($response['id'])) {
            return to_route('shop.index')->withErrors(
                ['message' => $response['message'] ?? 'Something went wrong.']
            );
        }

        foreach ($response['links'] as $links) {
            if ($links['rel'] === 'approve') {
                return redirect()->away($links['href']);
            }
        }

        return to_route('shop.index')->withErrors(
            ['message' => $response['message'] ?? 'Something went wrong.']
        );
    }

    public function successful(Request $request)
    {
        $response = $this->provider->capturePaymentOrder($request['token']);

        if (!array_key_exists('status', $response)) {
            // TODO: Save to db as unknown error transaction

            return to_route('shop.index')->withErrors(['message' => 'Something went wrong.']);
        }

        if ($response['status'] !== 'COMPLETED') {
            // TODO: Save the transaction with its status

            return to_route('shop.index')->withErrors(
                ['message' => $response['message'] ?? 'Something went wrong.']
            );
        }

        // TODO: Save transactions to DB
        dd($response);

        // TODO: Top up the users balance

        return to_route('shop.index')->with('success', 'Transaction completed!');
    }
    public function cancelled()
    {
        // TODO: Save to DB as cancelled transaction

        return to_route('shop.index')->withErrors(
            ['message' => 'You have canceled the transaction.']
        );
    }
}
