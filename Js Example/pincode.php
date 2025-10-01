<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// API endpoint URL
$apiUrl = 'https://api.example.com/data';

try {
    // Initialize cURL session
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and fetch data
    $response = curl_exec($ch);

    // Check for cURL errors
    if(curl_errno($ch)) {
        throw new Exception('Curl error: ' . curl_error($ch));
    }

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $data = json_decode($response, true);

    // Check if the decoding was successful
    if ($data === null) {
        throw new Exception('Error decoding JSON');
    }

    // Process and use the data as needed
    print_r($data);

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>

</body>
</html>