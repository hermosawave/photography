<?php
require_once('vendor/autoload.php');
require_once 'secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);

// Get parameters from query string
$productId = $_GET['product_id'];
$description = $_GET['description'];
$imageUrl = $_GET['image_url'];
$printSize = $_GET['printsize'];


function getShippingRegions() {
    return [
        'North_America' => ['US', 'CA', 'MX'],
        'Europe' => ['GB', 'FR', 'DE', 'IT', 'ES', 'NL', 'BE', 'CH', 'SE', 'NO', 'DK', 'FI'],
        'Asia_Pacific' => ['JP', 'KR', 'AU', 'NZ', 'SG', 'HK'],
        // Add more regions as needed
    ];
}

// switch statement to organize shipping prices
// price and shipping calculator 
switch ($printSize) {
    case 'Small Print':
        $printPrice = 1500; // amount in cents
        $productSize =  'Small Print';
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

// start
function getShippingRatesByRegion($productSize) {
    $rates = [
        'Small' => [
            'US' => ['amount' => 500, 'days' => '5-7'],
            'CA' => ['amount' => 1000, 'days' => '7-10'],
            'Europe' => ['amount' => 1500, 'days' => '7-10'],
            'Asia' => ['amount' => 2000, 'days' => '8-12']
        ],
        'Medium' => [
            'US' => ['amount' => 800, 'days' => '5-7'],
            'CA' => ['amount' => 1500, 'days' => '7-10'],
            'Europe' => ['amount' => 2000, 'days' => '7-10'],
            'Asia' => ['amount' => 2500, 'days' => '8-12']
        ],
        'Large' => [
            'US' => ['amount' => 1200, 'days' => '5-7'],
            'CA' => ['amount' => 2000, 'days' => '7-10'],
            'Europe' => ['amount' => 2500, 'days' => '7-10'],
            'Asia' => ['amount' => 3000, 'days' => '8-12']
        ]
    ];
    
    return $rates[$productSize] ?? $rates['Medium'];
}

// Get product size from URL
// dont need // $productSize = isset($_GET['printsize']) ? trim($_GET['printsize']) : 'Medium';

// Get rates for this size
$rates = getShippingRatesByRegion($productSize);

// Create shipping options array
$shipping_options = [];

// Create one shipping option per region for this size
foreach($rates as $region => $rate) {
    list($min_days, $max_days) = explode('-', $rate['days']);
    $shipping_options[] = [
        'shipping_rate_data' => [
            'type' => 'fixed_amount',
            'fixed_amount' => [
                'amount' => $rate['amount'],
                'currency' => 'usd',
            ],
            'display_name' => "Shipping to $region",
            'delivery_estimate' => [
                'minimum' => ['unit' => 'business_day', 'value' => (int)$min_days],
                'maximum' => ['unit' => 'business_day', 'value' => (int)$max_days]
            ],
            'shipping_address_types' => ['shipping'],
            'tax_behavior' => 'exclusive',
        ]
    ];
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


// Get all allowed countries
$regions = getShippingRegions();
$allowed_countries = [];
foreach($regions as $countries) {
    $allowed_countries = array_merge($allowed_countries, $countries);
}

// For debugging
error_log("Product Size: " . $productSize);



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
    'shipping_address_collection' => [
        'allowed_countries' => ['US', 'CA', 'GB', 'FR', 'DE', 'IT', 'ES', 'NL', 'JP', 'AU', 'SG']
    ],
    'shipping_options' => $shipping_options,
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