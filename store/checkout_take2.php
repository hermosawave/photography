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
    
    
    // Let's var_dump the price object to verify it's valid
    var_dump($price);
    

    
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price' => $price->id,
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'https://hermosawavephotography.com/store/success.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'https://hermosawavephotography.com/store/cancel.php',
        // 'billing_address_collection' => 'required',
        // 'shipping_address_collection' => true

    ]);
    // Add debug output
        var_dump($session);
    
    } catch(\Stripe\Exception\ApiErrorException $e) {
        echo "Stripe Error: " . $e->getMessage();
        echo "<br>Error Code: " . $e->getStripeCode();
        echo "<br>Error Type: " . $e->getError()->type;
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
        const stripe = Stripe('pk_test_your_publishable_key');
        
        window.addEventListener('load', function() {
            console.log('Session ID:', '<?php echo $session->id; ?>');
            stripe.redirectToCheckout({
                sessionId: '<?php echo $session->id; ?>'
            }).then(function(result) {
                if (result.error) {
                    console.error(result.error);
                    alert(result.error.message);
                }
            });
        });
    </script>
    <p>Redirecting to checkout...</p>
</body>
</html>