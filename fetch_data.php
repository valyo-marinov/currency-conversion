<?php
$api_key = 'da5ccaf3255e57986ac9ff4d';

$from = $_GET['from'] ?? 'USD';
$to = $_GET['to'] ?? 'BGN';
$amount = $_GET['amount'] ?? 1;


$url = "https://v6.exchangerate-api.com/v6/$api_key/latest/$from";


$response = file_get_contents($url);

if ($response !== false) {
    $data = json_decode($response, true);

   
    if (isset($data['conversion_rates'][$to])) {
        $rate = $data['conversion_rates'][$to];
        $converted = round($amount * $rate, 2);
        echo "<strong>Резултат:</strong><br>$amount $from = $converted $to";
    } else {
        echo "Валутата $to не е намерена.";
    }
} else {
    echo "Грешка при извличане на данни от API.";
}
?>
