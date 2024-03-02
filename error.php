<?php
// error.php

// Check if the error message is provided in the URL
if (isset($_GET["message"])) {
    $errorMessage = $_GET["message"];

    // Set the HTTP status code
    http_response_code(400); // You can change this to the appropriate HTTP status code

    // Define the JSON response
    $response = [
        'error' => true,
        'message' => $errorMessage,
    ];

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Output the JSON response
    echo json_encode($response);
    exit();
} else {
    // If no error message is provided, redirect to a generic error page or home page
    header("Location: /"); // You can change this to the appropriate URL
    exit();
}
?>