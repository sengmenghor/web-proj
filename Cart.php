<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="style.css">
  <script src="js/cart.js" defer></script>
</head>
<body>
  <header>
    <h1>The Sports</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="cart.php" class="active">Cart</a></li>
        <li><a href="checkout.php">Checkout</a></li>
        <?php if (isset($_SESSION['user'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <main>
    <section class="cart">
      <h2>Your Cart</h2>
      <div id="cart-items"></div>
      <div id="cart-total"></div>
      <button id="checkout-btn">Checkout</button>
      <button id="cancel-cart-btn">Cancel Cart</button>
    </section>
  </main>

  <footer>
      <div class="footer-content">
        <div class="footer-section about">
          <h3>About Us</h3>
          <p>
            The Sports is your go-to store for trendy and affordable products.
          </p>
        </div>
        <div class="footer-section links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="cart.php">Cart</a></li>
          </ul>
        </div>
        <div class="footer-section contact">
          <h3>Contact Us</h3>
          <p>Email: support@horathanet.com</p>
          <p>Phone: +123 456 7890</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> The Sports. All rights reserved.</p>
      </div>
    </footer>
</body>
</html>