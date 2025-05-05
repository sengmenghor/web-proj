<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart - My E-Commerce Store</title>
    <link rel="stylesheet" href="crt.css" />
  </head>
  <body>
    <header>
      <h1>My E-Commerce Store</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="Cart.php">Cart</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <h2>Your Cart</h2>
      <div id="cart-items">
        <!-- Cart items will be dynamically inserted here -->
      </div>
      <button onclick="checkout()">Checkout</button>
    </main>

    <footer>
      <p>&copy; 2025 My H@N Store</p>
    </footer>
    <script src="cart.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
