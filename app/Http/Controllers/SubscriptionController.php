<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SubscriptionController extends Controller
{
   // SubscriptionController.php
public function subscribe(Request $request, Course $course)
{
    $request->validate([
        'user_id' => 'required|exists:users,id' // Add user ID validation
    ]);

    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price' => 'price_1YourRealPriceID', // REPLACE WITH REAL PRICE ID
            'quantity' => 1,
        ]],
        'mode' => 'subscription',
        'metadata' => [
            'user_id' => $request->user_id,
            'course_id' => $course->id
        ],
        'success_url' => url('/subscription-success?session_id={CHECKOUT_SESSION_ID}'),
        'cancel_url' => url('/subscription-cancel'),
    ]);

    return response()->json(['id' => $session->id]);
}
    public function handleWebhook(Request $request)
{
    $event = $request->all();

    if ($event['type'] === 'checkout.session.completed') {
        $session = $event['data']['object'];

        $userId = $session['metadata']['user_id'] ?? null;
        $courseId = $session['metadata']['course_id'] ?? null;

        if ($userId && $courseId) {
            Subscription::create([
                'user_id' => $userId,
                'course_id' => $courseId,
                'status' => 'active',
            ]);
        }
    }

    return response()->json(['message' => 'Webhook received']);
}

}
