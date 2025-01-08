<?php

require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_your_key');

// Get parameters from query string
$productId = $_GET['product_id'];
$description = $_GET['description'];\
$imageUrl = $_GET['image_url'];

try {
    // Create the product
    $product = \Stripe\Product::create([
        'name' => "Product #{$productId}",
        'description' => $description,
        'images' => [$imageUrl],
        // You can add additional metadata if needed
        'metadata' => [
            'product_id' => $productId
        ]
    ]);

    // Create a price for the product (example with $20.00)
    $price = \Stripe\Price::create([
        'product' => $product->id,
        'unit_amount' => 2000, // amount in cents
        'currency' => 'usd',
    ]);

    // Create a Checkout Session
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price' => $price->id,
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'https://your-domain.com/success',
        'cancel_url' => 'https://your-domain.com/cancel',
    ]);

    // Return session ID to your frontend
    echo json_encode(['id' => $session->id]);

} catch(\Stripe\Exception\ApiErrorException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

?>