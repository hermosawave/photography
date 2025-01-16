<?php
require_once('vendor/autoload.php');
require_once 'secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);

// Get parameters from query string
$productId = $_GET['product_id'];
$description = $_GET['description'];
$imageUrl = $_GET['image_url'];
$printSize = $_GET['printsize'];



// switch statement to organize shipping prices
// price and shipping calculator 
switch ($printSize) {
    case 'Small Print':
        $printPrice = 1500; // amount in cents
        $productSize =  'Small';
        break;
    case 'Small Framed Print':
        $printPrice = 3500;
        $productSize =  'Small';
        break;
    case 'Medium Print':
        $printPrice = 2500;
        $productSize =  'Medium';
        break;
    case 'Medium Framed Print':
        $printPrice = 7500;
        $productSize = 'Medium';
        break;
    case 'Large Print':
        $printPrice = 5000;
        $productSize = 'Large';
      break;
    case 'Large Framed Print':
        $printPrice = 15000;
        $productSize = 'Large';
        break;
    default:
        $printPrice = 100;
        $productSize = 'Medium';
        break;
}


try {
    
    // Your existing product and price creation code...
    // Create the product
    $product = \Stripe\Product::create([
        'name' => "Product #{$productId}",
        'description' => $description . ' - ' . $printSize,
        'images' => [$imageUrl],
        // You can add additional metadata if needed
        'metadata' => [
            'product_id' => $productId,
            'print_size' => $printSize
        ]
]);


// Create a price for the product
$price = \Stripe\Price::create([
    'product' => $product->id,
    'unit_amount' => $printPrice, // amount in cents
    'currency' => 'usd',
]);



// For debugging
//error_log("Product Size: " . $productSize);



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
      'phone_number_collection' => ['enabled' => true],
      'consent_collection' => ['promotions' => 'auto'],
    'shipping_address_collection' => [
        'allowed_countries' => ['US', 'CA', 'GB', 'FR', 'DE', 'IT', 'ES', 'NL', 'JP', 'AU', 'SG']
    ],
   'shipping_options' => ['shipping_rate' => 'shr_1Qhl2GJ9bHYdHf2n8FqCy7gR'],
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