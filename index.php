<?php
// Example PHP code (can be removed if not needed)
echo "<!-- PHP Loaded Successfully -->";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Sports</title>
    <link rel="stylesheet" href="style.css" />
    <script src="js/script.js"></script>

  </head>
  <body>
    <!-- Header -->
    <header>
      <h1>The </h1>
      <nav>
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="checkout.php">Checkout</a></li>
          <?php if (isset($_SESSION['user'])): ?>
            <li><a href="logout.php">Logout</a></li>
          <?php else: ?>
            <li><a href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <!-- Featured Categories -->
      <section class="home-categories">
        <h2>Explore Our Categories</h2>
        <div class="category-grid">
          <div class="category-card">
            <img src="image/jersey1.webp" alt="Jersey" />
            <h3>Jerseys</h3>
            <a href="shop.php" class="btn">Shop Jerseys</a>
          </div>
          <div class="category-card">
            <img src="image/bag.webp" alt="Bags" />
            <h3>Bags</h3>
            <a href="shop.php" class="btn">Shop Bags</a>
          </div>
          <div class="category-card">
            <img src="image/5.png" alt="Accessories" />
            <h3>Accessories</h3>
            <a href="shop.php" class="btn">Shop Accessories</a>
          </div>
        </div>
      </section>

      <!-- Featured Products -->
      <section class="products">
          <h2>Featured Products</h2>
        <div class="product-grid">
          <div class="product">
            <img src="image/2.png" alt="Product 1" />
            <h3>Product 1</h3>
            <p>$20.00</p>
            <div class="product-buttons">
              <button onclick="addToCart({id: 1, name: 'Product 1', price: 20, image: 'image/2.png', category: 'Bags'})">Add to Cart</button>
              <button onclick="buyNow({id: 1, name: 'Product 1', price: 20, image: 'image/2.png', category: 'Bags'})">Buy Now</button>
            </div>
          </div>
          <div class="product">
            <img src="image/4.png" alt="Product 2" />
            <h3>Product 2</h3>
            <p>$30.00</p>
            <div class="product-buttons">
              <button onclick="addToCart({id: 2, name: 'Product 2', price: 30, image: 'image/4.png', category: 'Bags'})">Add to Cart</button>
              <button onclick="buyNow({id: 2, name: 'Product 2', price: 30, image: 'image/4.png', category: 'Bags'})">Buy Now</button>
            </div>
          </div>
          <div class="product">
            <img src="image/5.png" alt="Product 3" />
            <h3>Product 3</h3>
            <p>$15.00</p>
            <div class="product-buttons">
              <button onclick="addToCart({id: 3, name: 'Product 3', price: 15, image: 'image/5.png', category: 'Bags'})">Add to Cart</button>
              <button onclick="buyNow({id: 3, name: 'Product 3', price: 15, image: 'image/5.png', category: 'Bags'})">Buy Now</button>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
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
          <p>Email: supportthesports.com</p>
          <p>Phone: +123 456 7890</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> The Sports. All rights reserved.</p>
      </div>
    </footer>

    <script src="js/script.js"></script>
  </body>
</html>
