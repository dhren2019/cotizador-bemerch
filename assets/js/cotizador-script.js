document.addEventListener('DOMContentLoaded', function () {
  // Script para mostrar u ocultar el campo de tallas según el checkbox
  const mostrarTallasCheckbox = document.getElementById('mostrar_tallas');
  const tallasSelector = document.querySelector('.cotizador-tallas-selector');

  mostrarTallasCheckbox.addEventListener('change', function () {
    if (this.checked) {
      tallasSelector.style.display = 'none';
    } else {
      tallasSelector.style.display = 'block';
    }
  });

  // Script para calcular el precio total del producto
  const basePriceInput = document.getElementById('base_price');
  const quantityInput = document.getElementById('quantity');
  const totalField = document.querySelector('.cotizador-total-price');

  function updateTotalPrice() {
    const basePrice = parseFloat(basePriceInput.value);
    const quantity = parseInt(quantityInput.value);
    const total = basePrice * quantity;

    totalField.textContent = `Precio Total: $${total.toFixed(2)}`;
  }

  basePriceInput.addEventListener('change', updateTotalPrice);
  quantityInput.addEventListener('change', updateTotalPrice);
});
