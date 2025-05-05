<?php
// filepath: c:\xampp\htdocs\eco\web-proj\buy_product.php

// Database connection
$servername = "localhost:8080/";
$username = "root";
$password = "";
$dbname = "Web";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $product_id = intval($_POST['product_id']);
    $user_id = intval($_POST['user_id']);
    $quantity = intval($_POST['quantity']);
    $purchase_date = date("Y-m-d H:i:s");

    // Insert data into the database
    $sql = "INSERT INTO purchases (product_id, user_id, quantity, purchase_date) 
            VALUES ('$product_id', '$user_id', '$quantity', '$purchase_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Purchase recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Buy Product</title>
</head>
<body>
    <h1>Buy Product</h1>
    <form method="POST" action="buy_product.php">
        <label for="product_id">Product ID:</label>
        <input type="number" id="product_id" name="product_id" required><br><br>

        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <button type="submit">Buy</button>
    </form>
</body>
</html>