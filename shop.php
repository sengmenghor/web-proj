<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop - HOR@THANET</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <h1>H@N STORE</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php" class="active">Shop</a></li>
          <li><a href="Cart.php">Cart</a></li>
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
        <div class="product" data-category="jersey">
          <img src="image/1.webp" alt="Jersey 1" />
          <h3>Jersey 1</h3>
          <p>$25.00</p>
          <button onclick="addToCart(1)">Add to Cart</button>
        </div>

        <div class="product" data-category="bags">
          <img src="image/2.png" alt="Bag 1" />
          <h3>Bag 1</h3>
          <p>$30.00</p>
          <button onclick="addToCart(2)">Add to Cart</button>
        </div>

        <div class="product" data-category="accessories">
          <img src="image/3.avif" alt="Watch 1" />
          <h3>Watch 1</h3>
          <p>$20.00</p>
          <button onclick="addToCart(3)">Add to Cart</button>
        </div>

        <div class="product" data-category="jersey">
          <img src="image/4.png" alt="Jersey 2" />
          <h3>Jersey 2</h3>
          <p>$28.00</p>
          <button onclick="addToCart(4)">Add to Cart</button>
        </div>
        <div class="product" data-category="jersey">
          <img src="image/5.png" alt="Jersey 1" />
          <h3>Jersey 1</h3>
          <p>$25.00</p>
          <button onclick="addToCart(1)">Add to Cart</button>
        </div>

        <div class="product" data-category="bags">
          <img src="image/6.png" alt="Bag 1" />
          <h3>Bag 1</h3>
          <p>$30.00</p>
          <button onclick="addToCart(2)">Add to Cart</button>
        </div>

        <div class="product" data-category="accessories">
          <img src="image/7.avif" alt="Watch 1" />
          <h3>Watch 1</h3>
          <p>$20.00</p>
          <button onclick="addToCart(3)">Add to Cart</button>
        </div>

        <div class="product" data-category="jersey">
          <img src="image/8.avif" alt="Jersey 2" />
          <h3>Jersey 2</h3>
          <p>$28.00</p>
          <button onclick="addToCart(4)">Add to Cart</button>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer>
      <p>&copy; 2025 HOR@THANET. All rights reserved.</p>
    </footer>

    <!-- JS -->
    <script src="js/script.js"></script>
  </body>
</html>
