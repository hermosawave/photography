<?php

require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_live_xAIwDPSwCps1kCOiBekWVTvT');

// Get parameters from query string
$productId = $_GET['product_id'];
$description = $_GET['description'];
$imageUrl = $_GET['image_url'];
$printSize = $_GET['printsize'];


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
        'success_url' => 'https://hermosawavephotography.com/store/success',
        'cancel_url' => 'https://hermosawavephotography.com/store/cancel',
        'billing_address_collection' => 'required',
        'shipping_address_collection' => true
    ]);

    // Return session ID to your frontend
  echo json_encode(['id' => $session->id]);

} catch(\Stripe\Exception\ApiErrorException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <script>
        // Initialize Stripe
        const stripe = Stripe('pk_live_mEH8H2NDXoHWuY5rij4ZfCIf');
        
        // Redirect to Checkout as soon as the page loads
        window.addEventListener('load', function() {
            stripe.redirectToCheckout({
                sessionId: '<?php echo $session->id; ?>'
            });
        });
    </script>
    

</body>
</html>