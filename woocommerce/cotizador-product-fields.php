<?php
// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Agregar la pestaña "Cotizador" en la página de edición de productos
function cotizador_marcado_product_tab($tabs) {
    $tabs['cotizador'] = array(
        'label'    => __('Cotizador', 'cotizador-marcado-plugin'),
        'target'   => 'cotizador_product_options',
        'priority' => 21,
    );
    return $tabs;
}
add_filter('woocommerce_product_data_tabs', 'cotizador_marcado_product_tab');

// Contenido de la pestaña "Cotizador" en la página de edición de productos
function cotizador_marcado_product_tab_content() {
    global $post;

    // Mostrar los campos del cotizador
    echo '<div id="cotizador_product_options" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';

    woocommerce_wp_select(
        array(
            'id'          => 'tecnicas_marcado',
            'label'       => __('Técnica de Marcaje', 'cotizador-marcado-plugin'),
            'description' => __('Selecciona la técnica de marcaje.', 'cotizador-marcado-plugin'),
            'options'     => array(
                'serigrafia' => __('Serigrafía', 'cotizador-marcado-plugin'),
                'bordado'    => __('Bordado', 'cotizador-marcado-plugin'),
                'transfer'   => __('Transfer', 'cotizador-marcado-plugin'),
            ),
        )
    );

    echo '</div>';
    echo '</div>';
}
add_action('woocommerce_product_data_panels', 'cotizador_marcado_product_tab_content');

// Guardar los datos del cotizador cuando se guarda el producto
function cotizador_marcado_save_product($post_id) {
    $tecnicas_marcado = isset($_POST['tecnicas_marcado']) ? sanitize_text_field($_POST['tecnicas_marcado']) : '';
    update_post_meta($post_id, 'tecnicas_marcado', $tecnicas_marcado);
}
add_action('woocommerce_process_product_meta', 'cotizador_marcado_save_product');
