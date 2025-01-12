<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_live_xAIwDPSwCps1kCOiBekWVTvT');

try {
    // Create product and price...
    $product = \Stripe\Product::create([...]);
    $price = \Stripe\Price::create([...]);

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
        'shipping_address_collection' => true
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