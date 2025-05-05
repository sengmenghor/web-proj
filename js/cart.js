document.addEventListener('DOMContentLoaded', () => {
  const cartItemsContainer = document.getElementById('cart-items');
  const cartTotalContainer = document.getElementById('cart-total');
  const cancelCartBtn = document.getElementById('cancel-cart-btn');

  // Retrieve the cart from localStorage
  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  if (cart.length === 0) {
    cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
    cartTotalContainer.innerHTML = '';
    return;
  }

  // Display cart items
  let total = 0;
  cartItemsContainer.innerHTML = cart.map(item => {
    total += item.price * item.quantity;
    return `
      <div class="cart-item">
        <img src="${item.image}" alt="${item.name}" />
        <h3>${item.name}</h3>
        <p>Price: $${item.price}</p>
        <p>Quantity: ${item.quantity}</p>
        <button onclick="removeFromCart(${item.id})">Remove</button>
      </div>
    `;
  }).join('');

  // Display total price
  cartTotalContainer.innerHTML = `<h3>Total: $${total.toFixed(2)}</h3>`;

  // Add event listener to "Cancel Cart" button
  cancelCartBtn.addEventListener('click', () => {
    localStorage.removeItem('cart'); // Clear the cart from localStorage
    location.reload(); // Reload the page to update the cart
  });
});

// Function to remove an item from the cart
function removeFromCart(productId) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart = cart.filter(item => item.id !== productId);
  localStorage.setItem('cart', JSON.stringify(cart));
  location.reload(); // Reload the page to update the cart
}