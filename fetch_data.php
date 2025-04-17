<?php
$api_key = 'da5ccaf3255e57986ac9ff4d';
$base_currency = 'USD';

$target_currency = 'BGN';

$url = "https://v6.exchangerate-api.com/v6/$api_key/latest/$base_currency";
$response = file_get_contents($url);

if ($response !== false) {
    $data = json_decode($response, true);


    if (isset($data['conversion_rates'][$target_currency])) {
        $rate = $data['conversion_rates'][$target_currency];
        echo "1 $base_currency = $rate $target_currency";
    } else {
        echo "Валутата $target_currency не е намерена.";
    }
} else {
    echo "Грешка при извличане на данни от API.";
}
?>