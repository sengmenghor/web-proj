<?php
// filepath: c:\xampp\htdocs\eco\web-proj\checkout.php

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart = json_decode($_POST['cart'], true); // Decode cart data from the form
    $total_amount = floatval($_POST['total_amount']);
    $order_date = date("Y-m-d H:i:s");
    $status = 'Pending';

    // Simulate order processing
    echo "Order placed successfully!<br>";
    echo "Order Details:<br>";
    echo "Total Amount: $" . $total_amount . "<br>";
    echo "Order Date: " . $order_date . "<br>";
    echo "Status: " . $status . "<br>";

    // Display cart items
    echo "<h3>Cart Items:</h3>";
    foreach ($cart as $item) {
        echo "Product: " . htmlspecialchars($item['name']) . "<br>";
        echo "Price: $" . htmlspecialchars($item['price']) . "<br>";
        echo "Quantity: " . htmlspecialchars($item['quantity']) . "<br><br>";
    }

    // Clear the cart (if stored in session or local storage)
    echo "<script>localStorage.removeItem('cart');</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Load cart data from localStorage
        document.addEventListener('DOMContentLoaded', () => {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartContainer = document.getElementById('cart-items');
            const totalAmountInput = document.getElementById('total-amount');
            let total = 0;

            if (cart.length === 0) {
                cartContainer.innerHTML = '<p>Your cart is empty.</p>';
                return;
            }

            cartContainer.innerHTML = cart.map(item => {
                total += item.price * item.quantity;
                return `
                    <div class="cart-item">
                        <h3>${item.name}</h3>
                        <p>Price: $${item.price}</p>
                        <p>Quantity: ${item.quantity}</p>
                    </div>
                `;
            }).join('');

            totalAmountInput.value = total.toFixed(2);
        });
    </script>
</head>
<body>
    <header>
        <h1>Checkout</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="checkout">
            <h2>Review Your Order</h2>
            <div id="cart-items"></div>
            <form action="checkout.php" method="POST">
                <input type="hidden" id="cart-data" name="cart">
                <input type="hidden" id="total-amount" name="total_amount">
                <button type="submit" class="btn">Place Order</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> The Sports. All rights reserved.</p>
    </footer>

    <script>
        // Pass cart data to the form before submission
        const form = document.querySelector('form');
        form.addEventListener('submit', () => {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById('cart-data').value = JSON.stringify(cart);
        });
    </script>
</body>
</html>
