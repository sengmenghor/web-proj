function addToCart(product) {
  // Retrieve the existing cart from localStorage or initialize an empty array
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Check if the product already exists in the cart
  const existingProduct = cart.find(item => item.id === product.id);
  if (existingProduct) {
    existingProduct.quantity += 1; // Increment quantity if product exists
  } else {
    product.quantity = 1; // Add quantity property for new product
    cart.push(product); // Add new product to the cart
  }

  // Save the updated cart back to localStorage
  localStorage.setItem('cart', JSON.stringify(cart));

  alert(`${product.name} has been added to your cart!`);
}

function filterProducts(category) {
  const products = document.querySelectorAll('.product');
  products.forEach(product => {
    if (category === 'all' || product.dataset.category === category) {
      product.style.display = 'block';
    } else {
      product.style.display = 'none';
    }
  });
}

function buyNow(product) {
  addToCart(product); // Add the product to the cart
  window.location.href = 'cart.php'; // Redirect to the cart page
}