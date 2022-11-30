


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
// create a new cURL resource

$url = "https://api.thingspeak.com/channels/1917506/fields/1/last.json";
$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_URL,$url);

$result = curl_exec($ch);

$format_status = json_decode($result);
$decoded_status = $format_status->field1;

$decoded_status = intval($decoded_status);

echo $decoded_status;



?>



</body>
</html>