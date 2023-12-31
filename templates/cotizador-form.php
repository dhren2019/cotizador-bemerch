<?php
// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

global $product;

// Obtener el idioma seleccionado en la configuración del plugin
$idioma_plugin = get_option('idioma_plugin', 'es');

// Textos en español
if ($idioma_plugin === 'es') {
    $cotiza_tu_producto_text = 'Cotiza tu Producto';
    $tecnicas_marcaje_text = 'Técnica de Marcaje:';
    $colores_disponibles_text = 'Colores Disponibles:';
    $tallas_text = 'Tallas Disponibles:';
    $stock_minimo_text = 'Stock Mínimo Requerido:';
    $cotizar_text = 'Cotizar';
    $precio_total_text = 'Precio Total:';
}

// Textos en inglés
if ($idioma_plugin === 'en') {
    $cotiza_tu_producto_text = 'Quote Your Product';
    $tecnicas_marcaje_text = 'Marking Technique:';
    $colores_disponibles_text = 'Available Colors:';
    $tallas_text = 'Available Sizes:';
    $stock_minimo_text = 'Minimum Stock Required:';
    $cotizar_text = 'Quote';
    $precio_total_text = 'Total Price:';
}
?>

<div class="cotizador-form container mt-4 p-4 rounded bg-light">
    <h3 class="mb-4"><?php echo esc_html($cotiza_tu_producto_text); ?></h3>

    <label for="tecnicas_marcado"><?php echo esc_html($tecnicas_marcaje_text); ?></label>
    <select class="form-control" name="tecnicas_marcado" id="tecnicas_marcado">
        <option value="serigrafia"><?php _e('Serigrafía', 'cotizador-marcado-plugin'); ?></option>
        <option value="bordado"><?php _e('Bordado', 'cotizador-marcado-plugin'); ?></option>
        <option value="transfer"><?php _e('Transfer', 'cotizador-marcado-plugin'); ?></option>
        <!-- Agrega aquí más opciones si es necesario -->
    </select>

    <?php
    // Mostrar los campos de colores solo si no está seleccionado el checkbox en el backend
    $mostrar_tallas = get_option('mostrar_tallas');
    if (!$mostrar_tallas) :
    ?>
        <div class="cotizador-color-selector mt-4">
            <label for="colores_disponibles"><?php echo esc_html($colores_disponibles_text); ?></label>
            <div class="d-flex">
                <div class="cotizador-color" style="background-color: red;"></div>
                <div class="cotizador-color" style="background-color: blue;"></div>
                <div class="cotizador-color" style="background-color: black;"></div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    // Mostrar el campo de tallas solo si no está seleccionado el checkbox en el backend
    if (!$mostrar_tallas) :
    ?>
        <div class="cotizador-tallas-checkbox mt-4">
            <input type="checkbox" name="mostrar_tallas" id="mostrar_tallas" value="1">
            <label for="mostrar_tallas"><?php echo esc_html($tallas_text); ?></label>
        </div>
    <?php endif; ?>

    <?php
    // Mostrar el campo de tallas solo si no está seleccionado el checkbox en el backend
    if (!$mostrar_tallas) :
    ?>
        <div class="cotizador-tallas-selector mt-4">
            <label for="tallas_disponibles"><?php echo esc_html($tallas_text); ?></label>
            <input type="text" class="form-control" name="tallas_disponibles" id="tallas_disponibles" placeholder="<?php _e('Ingresa las tallas disponibles', 'cotizador-marcado-plugin'); ?>">
        </div>
    <?php endif; ?>

    <div class="cotizador-stock-minimo mt-4">
        <label for="stock_minimo"><?php echo esc_html($stock_minimo_text); ?></label>
        <input type="number" class="form-control" name="stock_minimo" id="stock_minimo" value="5" min="1">
    </div>

    <input type="submit" class="btn btn-primary mt-4" value="<?php echo esc_html($cotizar_text); ?>">
    <div class="cotizador-total-price mt-3">
        <strong><?php echo esc_html($precio_total_text); ?></strong>
    </div>
</div>
