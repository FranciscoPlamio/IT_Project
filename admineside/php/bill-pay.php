<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $cardNumber = htmlspecialchars($_POST['cardNumber']);
    $expiry = htmlspecialchars($_POST['expiry']);
    $cvv = htmlspecialchars($_POST['cvv']);
    $amount = htmlspecialchars($_POST['amount']);

    if (empty($name) || empty($email) || empty($cardNumber) || empty($expiry) || empty($cvv) || empty($amount)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    if (!is_numeric($cardNumber) || strlen($cardNumber) < 13 || strlen($cardNumber) > 19) {
        echo "Invalid card number.";
        exit;
    }

    if (!is_numeric($cvv) || strlen($cvv) < 3 || strlen($cvv) > 4) {
        echo "Invalid CVV.";
        exit;
    }

    // Normally here you integrate a payment gateway like Stripe or PayPal
    echo "Payment of $" . $amount . " was successful! Thank you, " . $name . ".";
}
?>
