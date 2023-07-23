<?php
// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Calcular el precio total del producto con marcaje
function cotizador_marcado_calculate_price($price, $product) {
    $tecnicas_marcado = get_post_meta($product->get_id(), '_tecnicas_marcado', true);
    $stock_minimo = get_post_meta($product->get_id(), '_stock_minimo', true);

    // Realizar el cálculo del precio total basado en las opciones seleccionadas
    // Puedes implementar tu propia lógica de cálculo aquí, dependiendo de las técnicas de marcaje y las opciones adicionales.

    // Ejemplo: si la técnica de marcaje es "serigrafia" y el precio base del producto es $10, añadir $2 por unidad como costo de serigrafia
    if ($tecnicas_marcado === 'serigrafia') {
        $serigrafia_cost = 2; // Costo adicional por unidad para serigrafia
        $total_price = $price + ($serigrafia_cost * $stock_minimo);
        return $total_price;
    }

    // Si no se selecciona ninguna técnica de marcaje, se devuelve el precio base del producto
    return $price;
}
add_filter('woocommerce_product_get_price', 'cotizador_marcado_calculate_price', 10, 2);
add_filter('woocommerce_product_variation_get_price', 'cotizador_marcado_calculate_price', 10, 2);

// Mostrar el precio total en el formulario del cotizador
function cotizador_marcado_display_total_price() {
    global $product;

    if ($product && $product->is_type('simple')) {
        $price = $product->get_price();
        $total_price = cotizador_marcado_calculate_price($price, $product);

        // Mostrar el precio total
        echo '<div class="cotizador-total-price">';
        echo '<strong>' . __('Precio Total:', 'cotizador-marcado-plugin') . '</strong> ' . wc_price($total_price);
        echo '</div>';
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cotizador_marcado_display_total_price');
