<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart - The Sports</title>
  <link rel="stylesheet" href="../css/style.css" />
  <script src="../js/cart.js"></script>
  <script src="../js/script.js"></script>
  <script src="../js/jquery.min.js"></script>
</head>
<body>
  <header>
    <!-- ...existing header code... -->
  </header>

  <main>
    <section class="cart">
      <div class="cart-container">
        <h1>Your Cart</h1>
        <div id="cart-items"></div>
        <div id="cart-total"></div>

        <!-- Checkout Form -->
        <form method="POST" action="checkout.php" id="checkout-form" onsubmit="return prepareCheckoutData();">
          <input type="hidden" id="cart_items_data" name="cart_items_data" value="">
          <input type="hidden" id="total_price" name="total_price" value="">
          <input type="hidden" id="total_quantity" name="total_quantity" value="">
          <button type="submit" id="checkout-btn">Checkout</button>
          <button type="button" id="cancel-cart-btn">Cancel Cart</button>
        </form>
      </div>
    </section>
  </main>

  <footer>
    <!-- ...existing footer code... -->
  </footer>

  <script>
  // Display cart items and totals
  function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let output = '';
    let total = 0;
    let totalQty = 0;
    if (cart.length === 0) {
      output = '<p>Your cart is empty.</p>';
      document.getElementById('checkout-btn').style.display = 'none';
    } else {
      output = '<ul>';
      cart.forEach(item => {
        output += `<li>${item.name} - $${item.price} x ${item.quantity}</li>`;
        total += item.price * item.quantity;
        totalQty += item.quantity;
      });
      output += '</ul>';
    }
    document.getElementById('cart-items').innerHTML = output;
    document.getElementById('cart-total').innerHTML = `<strong>Total: $${total.toFixed(2)} (${totalQty} items)</strong>`;
  }
  loadCart();

  // Prepare cart data for checkout
  function prepareCheckoutData() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let totalQuantity = 0;
    let totalPrice = 0;
    cart.forEach(item => {
      totalQuantity += item.quantity;
      totalPrice += item.quantity * item.price;
    });
    document.getElementById('cart_items_data').value = JSON.stringify(cart);
    document.getElementById('total_quantity').value = totalQuantity;
    document.getElementById('total_price').value = totalPrice.toFixed(2);
    return true;
  }

  // Cancel Cart button
  document.getElementById('cancel-cart-btn').addEventListener('click', function() {
    localStorage.removeItem('cart');
    location.reload();
  });
  </script>
</body>
</html>