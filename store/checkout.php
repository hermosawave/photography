<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_live_xAIwDPSwCps1kCOiBekWVTvT');

// Get parameters from query string
$productId = $_GET['product_id'];
$description = $_GET['description'];
$imageUrl = $_GET['image_url'];
$printSize = $_GET['printsize'];

try {
    
    // Your existing product and price creation code...
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


    // Create session with all our features
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price' => $price->id,
            'quantity' => 1,
        ]],
      'mode' => 'payment',
      'success_url' => 'https://hermosawavephotography.com/store/success.php',
      'cancel_url' => 'https://hermosawavephotography.com/store/cancel.php',
      'billing_address_collection' => 'required',
      'shipping_address_collection' => [
          'allowed_countries' => ['US', 'CA', 'JP', 'UK', 'DE', 'AU']
      ],
      'automatic_tax' => [
          'enabled' => true
      ]
]);

} catch(\Stripe\Exception\ApiErrorException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <script>
        // Initialize with your publishable key
        const stripe = Stripe('pk_live_mEH8H2NDXoHWuY5rij4ZfCIf');
        
        window.addEventListener('load', function() {
            stripe.redirectToCheckout({
                sessionId: '<?php echo $session->id; ?>'
            });
        });
    </script>
    <p>Redirecting to checkout...</p>
</body>
</html>