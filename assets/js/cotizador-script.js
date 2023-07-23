jQuery(document).ready(function($) {
    // Manejar cambios en las opciones del cotizador
    $('.cotizador-form select, .cotizador-form input[type="text"]').change(function() {
      updateTotalPrice(); // Actualizar el precio total en tiempo real
    });
  
    // Actualizar el precio total
    function updateTotalPrice() {
      var basePrice = parseFloat($('.cotizador-form').data('base-price'));
      var selectedTechnique = $('.cotizador-form #tecnicas_marcado').val();
      var stockMinimum = parseInt($('.cotizador-form #stock_minimo').val());
  
      // Implementar la lógica de cálculo del precio total en función de las opciones seleccionadas
      // Puedes ajustar este cálculo según tus opciones de marcaje y requerimientos específicos.
  
      // Ejemplo: Si la técnica de marcaje es "serigrafia", agregar $2 por unidad como costo de serigrafía
      var serigrafiaCost = 2; // Costo adicional por unidad para serigrafía
      var totalPrice = basePrice;
  
      if (selectedTechnique === 'serigrafia') {
        totalPrice += serigrafiaCost * stockMinimum;
      }
  
      // Mostrar el precio total
      $('.cotizador-total-price').html('<strong>Precio Total: </strong>' + formatPrice(totalPrice));
    }
  
    // Formatear el precio en formato moneda
    function formatPrice(price) {
      return '$' + price.toFixed(2);
    }
  });
  