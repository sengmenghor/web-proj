<?php
session_start();
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
      <h1>The Sports</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php" class="active">Shop</a></li>
          <li><a href="cart.php">Cart</a></li>
          <?php if (isset($_SESSION['user'])): ?>
            <li><a href="logout.php">Logout</a></li>
          <?php else: ?>
            <li><a href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <!-- Main Content -->
    <main>
      <!-- Category Filters -->
      <section class="categories">
        <h2>Shop by Category</h2>
        <button onclick="filterProducts('all')">All</button>
        <button onclick="filterProducts('jersey')">Jersey</button>
        <button onclick="filterProducts('bags')">Bags</button>
        <button onclick="filterProducts('accessories')">Accessories</button>
      </section>

      <!-- Product Grid -->
      <section class="products">
        <div class="product" data-category="all">
          <img src="image/1.webp" alt="Shoe1" />
          <h3>Shoe 1</h3>
          <p>$25.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 1, name: 'Shoe 1', price: 25, image: 'image/1.webp', category: 'Shoe1'})">Add to Cart</button>
            <button onclick="buyNow({id: 1, name: 'Shoe 1', price: 25, image: 'image/1.webp', category: 'Shoe1'})">Buy Now</button>
          </div>
        </div>

        <div class="product" data-category="all">
          <img src="image/4.png" alt="Shoe2" />
          <h3>Shoe 2</h3>
          <p>$28.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 2, name: 'Shoe 2', price: 28, image: 'image/4.png', category: 'Shoe2'})">Add to Cart</button>
            <button onclick="buyNow({id: 2, name: 'Shoe 2', price: 28, image: 'image/4.png', category: 'Shoe2'})">Buy Now</button>
          </div>
        </div>

        <!-- New Jersey Product 1 -->
        <div class="product" data-category="jersey">
          <img src="image/jersey1.webp" alt="Jersey 1" />
          <h3>Jersey 1</h3>
          <p>$32.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 3, name: 'Jersey 1', price: 32, image: 'image/jersey1.webp', category: 'jersey'})">Add to Cart</button>
            <button onclick="buyNow({id: 3, name: 'Jersey 1', price: 32, image: 'image/jersey1.webp', category: 'jersey'})">Buy Now</button>
          </div>
        </div>

        <!-- New Jersey Product 2 -->
        <div class="product" data-category="jersey">
          <img src="image/jersey2.webp" alt="Jersey 2" />
          <h3>Jersey 2</h3>
          <p>$35.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 4, name: 'Jersey 2', price: 35, image: 'image/jersey3.webp', category: 'jersey'})">Add to Cart</button>
            <button onclick="buyNow({id: 4, name: 'Jersey 2', price: 35, image: 'image/jersey3.webp', category: 'jersey'})">Buy Now</button>
          </div>
        </div>

        <!-- New Jersey Product 3 -->
        <div class="product" data-category="jersey">
          <img src="image/jersey3.webp" alt="Jersey 3" />
          <h3>Jersey 3</h3>
          <p>$35.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 5, name: 'Jersey 3', price: 35, image: 'image/jersey2.webp', category: 'jersey'})">Add to Cart</button>
            <button onclick="buyNow({id: 5, name: 'Jersey 3', price: 35, image: 'image/jersey2.webp', category: 'jersey'})">Buy Now</button>
          </div>
        </div>
        

        <div class="product" data-category="all">
          <img src="image/2.png" alt="Shoe3" />
          <h3>Shoe 3</h3>
          <p>$30.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 6, name: 'Shoe 3', price: 30, image: 'image/2.png', category: 'Shoe3'})">Add to Cart</button>
            <button onclick="buyNow({id: 6, name: 'Shoe 3', price: 30, image: 'image/2.png', category: 'Shoe3'})">Buy Now</button>
          </div>
        </div>
        <div class="product" data-category="bags">
          <img src="image/bag.webp" alt="Bag 1" />
          <h3>Bag 1</h3>
          <p>$30.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 7, name: 'Bag 1', price: 30, image: 'image/bag.webp', category: 'bags'})">Add to Cart</button>
            <button onclick="buyNow({id: 7, name: 'Bag 1', price: 30, image: 'image/bag.webp', category: 'bags'})">Buy Now</button>
          </div>
        </div>

        <div class="product" data-category="bags">
          <img src="image/bag1.jpg" alt="Bag 2" />
          <h3>Bag 2</h3>
          <p>$30.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 8, name: 'Bag 2', price: 30, image: 'image/bag1.jpg', category: 'bags'})">Add to Cart</button>
            <button onclick="buyNow({id: 8, name: 'Bag 2', price: 30, image: 'image/bag1.jpg', category: 'bags'})">Buy Now</button>
          </div>
        </div>
        
        <div class="product" data-category="accessories">
          <img src="image/3.avif" alt="Shoe4" />
          <h3>Shoe 4</h3>
          <p>$20.00</p>
          <div class="product-buttons">
            <button onclick="addToCart({id: 9, name: 'Shoe 4', price: 20, image: 'image/3.avif', category: 'accessories'})">Add to Cart</button>
            <button onclick="buyNow({id: 9, name: 'Shoe 4', price: 20, image: 'image/3.avif', category: 'accessories'})">Buy Now</button>
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
          <p>Email: support@horathanet.com</p>
          <p>Phone: +123 456 7890</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> The Sports. All rights reserved.</p>
      </div>
    </footer>

    <!-- JS -->
    <script src="js/script.js"></script>
  </body>
</html>
