<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountTopupFormRequest;
use App\Models\WebsitePaypalTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    private const STATUS_CANCELLED = 'CANCELLED';
    private const STATUS_COMPLETED = 'COMPLETED';

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

        if (($response['id'] ?? null) === null) {
            Log::error('Error creating order', ['response' => $response]);

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
        $request->validate([
            'token' => 'required',
        ]);

        $response = $this->provider->capturePaymentOrder($request['token']);
        $paymentDetails = $response['purchase_units'][0]['payments']['captures'][0];

        if (!isset($response['status'], $paymentDetails)) {
            Log::error('Invalid response from PayPal', ['response' => $response]);

            return to_route('shop.index')->withErrors(['message' => __('Something went wrong, please try again later')]);
        }

        $user = $request->user();

        if (($response['status'] ?? null) === null) {
            $details = $response['error']['details'][0];
            $user->transactions()->create([
                'status' => $response['name'],
                'description' => sprintf('%s - %s', $details['issue'], $details['description']),
                'amount' => 0,
            ]);

            Log::error('Error capturing payment order', ['response' => $response]);

            return to_route('shop.index')->withErrors(['message' => __('Something went wrong, please check your paypal account to make sure nothing was deducted and try again')]);
        }

        $paymentDetails = $response['purchase_units'][0]['payments']['captures'][0];

        if ($response['status'] !== self::STATUS_COMPLETED) {
            $user->transactions()->create([
                'transaction_id' => $response['id'],
                'status' => $paymentDetails['status'],
                'amount' => $paymentDetails['amount']['value'],
                'currency' => $paymentDetails['amount']['currency_code'],
            ]);

            return to_route('shop.index')->withErrors(
                ['message' => $response['message'] ?? 'Something went wrong.']
            );
        }

        $user->transactions()->create([
            'transaction_id' => $response['id'],
            'status' => $paymentDetails['status'],
            'amount' => $paymentDetails['amount']['value'],
            'currency' => $paymentDetails['amount']['currency_code'],
        ]);

        $user->increment('website_balance', $paymentDetails['amount']['value']);

        return to_route('shop.index')->with('success', 'Transaction completed!');
    }
    public function cancelled()
    {
        Auth::user()->transactions()->create([
            'status' => self::STATUS_CANCELLED,
            'description' => 'The user cancelled the transaction',
            'amount' => 0,
        ]);

        return to_route('shop.index')->withErrors(
            ['message' => 'You have canceled the transaction.']
        );
    }
}
