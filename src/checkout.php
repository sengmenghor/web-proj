<?php
// Always start session at the very top
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Ensure cart session variable is always an array to avoid undefined index warnings
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Handle item deletion
if (isset($_POST['delete_item']) && isset($_POST['item_index'])) {
  $index = (int)$_POST['item_index'];
  if (isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);
    // Re-index array to avoid gaps
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    // Optionally, recalculate total price and quantity
    $_SESSION['total_price'] = 0;
    $_SESSION['total_quantity'] = 0;
    foreach ($_SESSION['cart'] as $item) {
      $_SESSION['total_price'] += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
      $_SESSION['total_quantity'] += ($item['quantity'] ?? 0);
    }
  }
}

// Prepare cart items and totals for invoice display
$cart_items = $_SESSION['cart'];
$total_price = 0;
foreach ($cart_items as $item) {
  $total_price += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
}
$invoice_number = 'INV-' . strtoupper(uniqid());
$date = date('Y-m-d H:i:s');
$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest';

// Check if payment form should be shown
$show_payment_form = isset($_POST['proceed_payment']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invoice - The Sports</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    .invoice-container { max-width: 700px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 2px 8px #0001; }
    .invoice-header { text-align: center; margin-bottom: 2rem; }
    .invoice-details { margin-bottom: 2rem; }
    .invoice-table { width: 100%; border-collapse: collapse; }
    .invoice-table th, .invoice-table td { padding: 8px; border-bottom: 1px solid #eee; text-align: left; }
    .invoice-table th { background: #f8f8f8; }
    .total-row th, .total-row td { font-weight: bold; }
    .pay-btn { margin-top: 2rem; padding: 12px 40px; background: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1rem; }
    .pay-btn:hover { background: #218838; }
    .payment-form { margin-top: 2rem; }
    .payment-form label { display: block; margin-bottom: 0.5rem; }
    .payment-form input, .payment-form select { width: 100%; padding: 8px; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 4px; }
  </style>
</head>
<body>
  <div class="invoice-container">
    <div class="invoice-header">
      <h1>Invoice</h1>
      <p><strong>Invoice #: </strong><?php echo $invoice_number; ?></p>
      <p><strong>Date: </strong><?php echo $date; ?></p>
      <p><strong>Customer: </strong><?php echo htmlspecialchars($user); ?></p>
    </div>
    <div class="invoice-details">
      <h3>Order Details</h3>
      <table class="invoice-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($cart_items)): ?>
            <?php foreach ($cart_items as $index => $item): ?>
            <tr>
              <td><?php echo htmlspecialchars($item['name'] ?? $item['product_name'] ?? ''); ?></td>
              <td><?php echo (int)($item['quantity'] ?? 0); ?></td>
              <td>$<?php echo number_format($item['price'] ?? 0, 2); ?></td>
              <td>$<?php echo number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 0), 2); ?></td>
              <td>
                <form method="POST" style="display:inline;">
                  <input type="hidden" name="item_index" value="<?php echo $index; ?>">
                  <button type="submit" name="delete_item" style="background:none;border:none;color:red;cursor:pointer;">&#10006;</button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" style="text-align:center;">Your cart is empty.</td>
            </tr>
          <?php endif; ?>
        </tbody>
        <tfoot>
          <tr class="total-row">
            <th colspan="3" style="text-align:right;">Total:</th>
            <th>$<?php echo number_format($total_price, 2); ?></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <?php if (!$show_payment_form): ?>
    <form method="POST">
      <input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>">
      <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
      <button type="submit" name="proceed_payment" class="pay-btn">Proceed to Payment</button>
    </form>
    <?php else: ?>
    <form action="payment.php" method="POST" class="payment-form">
      <input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>">
      <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
      <label for="fullname">Full Name</label>
      <input type="text" name="fullname" id="fullname" required>
      <label for="phone">Phone Number</label>
      <input type="tel" name="phone" id="phone" required>
      <label for="address">Address</label>
      <input type="text" name="address" id="address" required>
      <label for="postcode">Post Code</label>
      <input type="text" name="postcode" id="postcode" required>
      <label for="country">Country</label>
      <select name="country" id="country" required>
        <option value="">Select Country</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Canada">Canada</option>
        <option value="Australia">Australia</option>
        <!-- Add more countries as needed -->
      </select>
      <label for="card_number">Card Number</label>
      <input type="text" name="card_number" id="card_number" maxlength="19" required>
      <label for="card_expiry">Card Expiry (MM/YY)</label>
      <input type="text" name="card_expiry" id="card_expiry" maxlength="5" required>
      <label for="card_cvc">Card CVC</label>
      <input type="text" name="card_cvc" id="card_cvc" maxlength="4" required>
      <button type="submit" class="pay-btn">Pay Now</button>
    </form>
    <?php endif; ?>
  </div>
</body>
</html>