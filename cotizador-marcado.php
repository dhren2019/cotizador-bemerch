<?php
/*
Plugin Name: Cotizador de Marcaje para WooCommerce
Plugin URI: https://justseo.es/cotizador-marcado-plugin
Description: Agrega un cotizador de marcaje a los productos de tu tienda WooCommerce.
Version: 1.0.1
Author: Dhren
Author URI: https://justseo.es
Text Domain: cotizador-marcado-plugin
*/

// Evitar acceso directo al archivo
/*if (!defined('ABSPATH')) {
    exit;
}

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Incluir archivos y funciones
require_once plugin_dir_path(__FILE__) . 'includes/cotizador-functions.php';
require_once plugin_dir_path(__FILE__) . 'woocommerce/cotizador-product-fields.php';

// Definir shortcode para el cotizador
function cotizador_marcado_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/cotizador-form.php';
    return ob_get_clean();
}
add_shortcode('cotizador_marcado', 'cotizador_marcado_shortcode');

// Cargar archivo de traducción (opcional)
function cotizador_marcado_load_textdomain() {
    load_plugin_textdomain('cotizador-marcado-plugin', false, plugin_basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'cotizador_marcado_load_textdomain');

// Agregar configuración en el backend
function cotizador_marcado_settings_init() {
    // Registrar opciones para el idioma y las técnicas de marcaje
    register_setting('cotizador_marcado_settings_group', 'idioma_plugin', 'sanitize_text_field');
    register_setting('cotizador_marcado_settings_group', 'tecnicas_marcaje', 'sanitize_text_field');

    // Agregar sección de configuración
    add_settings_section(
        'cotizador_marcado_settings_section',
        __('Configuración del Cotizador', 'cotizador-marcado-plugin'),
        'cotizador_marcado_settings_section_callback',
        'cotizador-marcado-config'
    );

    function cotizador_marcado_enqueue_styles() {
        // Cargar Bootstrap desde un CDN
        wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2');
    }
    add_action('wp_enqueue_scripts', 'cotizador_marcado_enqueue_styles');
    

    // Agregar campos para el idioma y las técnicas de marcaje
    add_settings_field(
        'idioma_plugin_field',
        __('Seleccionar Idioma:', 'cotizador-marcado-plugin'),
        'cotizador_marcado_idioma_plugin_field_callback',
        'cotizador-marcado-config',
        'cotizador_marcado_settings_section'
    );

    add_settings_field(
        'tecnicas_marcaje_field',
        __('Técnicas de Marcaje:', 'cotizador-marcado-plugin'),
        'cotizador_marcado_tecnicas_marcaje_field_callback',
        'cotizador-marcado-config',
        'cotizador_marcado_settings_section'
    );
}
add_action('admin_init', 'cotizador_marcado_settings_init');

// Callback para la sección de configuración
function cotizador_marcado_settings_section_callback() {
    echo '<p>' . __('Configura las opciones del cotizador de marcaje.', 'cotizador-marcado-plugin') . '</p>';
}

// Callback para el campo de selección de idioma
function cotizador_marcado_idioma_plugin_field_callback() {
    $idioma_plugin = get_option('idioma_plugin', 'es');
    ?>
    <select name="idioma_plugin">
        <option value="es" <?php selected('es', $idioma_plugin); ?>>Español</option>
        <option value="en" <?php selected('en', $idioma_plugin); ?>>English</option>
    </select>
    <?php
}

// Callback para el campo de técnicas de marcaje
function cotizador_marcado_tecnicas_marcaje_field_callback() {
    $tecnicas_marcaje = get_option('tecnicas_marcaje');
    ?>
    <input type="text" name="tecnicas_marcaje" value="<?php echo esc_attr($tecnicas_marcaje); ?>" />
    <?php
}

// Función para agregar la pestaña "Cotizador" en el menú del backend
function cotizador_marcado_add_admin_menu() {
    add_menu_page(
        __('Cotizador', 'cotizador-marcado-plugin'), // Título de la página
        __('Cotizador', 'cotizador-marcado-plugin'), // Título del menú
        'manage_options',                          // Capacidad requerida para acceder a esta página
        'cotizador-marcado-config',               // Slug de la página (URL amigable)
        'cotizador_marcado_admin_page',            // Función que mostrará el contenido de la página
        'dashicons-money',                         // Icono para la pestaña (puedes cambiarlo)
        30                                         // Posición en el menú (ajusta según tus necesidades)
    );
}
add_action('admin_menu', 'cotizador_marcado_add_admin_menu');

// Función para mostrar el contenido de la página de configuración del cotizador
function cotizador_marcado_admin_page() {
    // Asegurarse de que solo los usuarios con los permisos adecuados puedan acceder a la página
    if (!current_user_can('manage_options')) {
        wp_die(__('No tienes permisos para acceder a esta página.', 'cotizador-marcado-plugin'));
    }

    // Aquí va el contenido de la página de configuración del cotizador
    echo '<div class="wrap">';
    echo '<h1>' . __('Configuración del Cotizador', 'cotizador-marcado-plugin') . '</h1>';

    // Mostrar el formulario de configuración
    settings_fields('cotizador_marcado_settings_group');
    do_settings_sections('cotizador-marcado-config');
    submit_button();

    echo '</div>';
}*/

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Incluir archivos y funciones
require_once plugin_dir_path(__FILE__) . 'includes/cotizador-functions.php';
require_once plugin_dir_path(__FILE__) . 'woocommerce/cotizador-product-fields.php';

// Definir shortcode para el cotizador
function cotizador_marcado_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/cotizador-form.php';
    return ob_get_clean();
}
add_shortcode('cotizador_marcado', 'cotizador_marcado_shortcode');

// Cargar archivo de traducción (opcional)
function cotizador_marcado_load_textdomain() {
    load_plugin_textdomain('cotizador-marcado-plugin', false, plugin_basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'cotizador_marcado_load_textdomain');

// Agregar configuración en el backend
function cotizador_marcado_settings_init() {
    // Registrar opciones para el idioma y las técnicas de marcaje
    register_setting('cotizador_marcado_settings_group', 'idioma_plugin', 'sanitize_text_field');
    register_setting('cotizador_marcado_settings_group', 'tecnicas_marcaje', 'sanitize_text_field');
    register_setting('cotizador_marcado_settings_group', 'mostrar_tallas', 'intval');

    // Agregar sección de configuración
    add_settings_section(
        'cotizador_marcado_settings_section',
        __('Configuración del Cotizador', 'cotizador-marcado-plugin'),
        'cotizador_marcado_settings_section_callback',
        'cotizador-marcado-config'
    );

    // Agregar campos para el idioma y las técnicas de marcaje
    add_settings_field(
        'idioma_plugin_field',
        __('Seleccionar Idioma:', 'cotizador-marcado-plugin'),
        'cotizador_marcado_idioma_plugin_field_callback',
        'cotizador-marcado-config',
        'cotizador_marcado_settings_section'
    );

    add_settings_field(
        'tecnicas_marcaje_field',
        __('Técnicas de Marcaje:', 'cotizador-marcado-plugin'),
        'cotizador_marcado_tecnicas_marcaje_field_callback',
        'cotizador-marcado-config',
        'cotizador_marcado_settings_section'
    );

    add_settings_field(
        'mostrar_tallas_field',
        __('Mostrar Tallas en el Frontend:', 'cotizador-marcado-plugin'),
        'cotizador_marcado_mostrar_tallas_field_callback',
        'cotizador-marcado-config',
        'cotizador_marcado_settings_section'
    );
}
add_action('admin_init', 'cotizador_marcado_settings_init');

// Función para agregar la pestaña "Cotizador" en el menú del backend
function cotizador_marcado_add_admin_menu() {
    add_menu_page(
        __('Cotizador', 'cotizador-marcado-plugin'), // Título de la página
        __('Cotizador', 'cotizador-marcado-plugin'), // Título del menú
        'manage_options',                          // Capacidad requerida para acceder a esta página
        'cotizador-marcado-config',               // Slug de la página (URL amigable)
        'cotizador_marcado_admin_page',            // Función que mostrará el contenido de la página
        'dashicons-money',                         // Icono para la pestaña (puedes cambiarlo)
        30                                         // Posición en el menú (ajusta según tus necesidades)
    );
}
add_action('admin_menu', 'cotizador_marcado_add_admin_menu');

// Función para mostrar el contenido de la página de configuración del cotizador
function cotizador_marcado_admin_page() {
    // Asegurarse de que solo los usuarios con los permisos adecuados puedan acceder a la página
    if (!current_user_can('manage_options')) {
        wp_die(__('No tienes permisos para acceder a esta página.', 'cotizador-marcado-plugin'));
    }

    // Aquí va el contenido de la página de configuración del cotizador
    echo '<div class="wrap">';
    echo '<h1>' . __('Configuración del Cotizador', 'cotizador-marcado-plugin') . '</h1>';

    // Mostrar el formulario de configuración
    settings_fields('cotizador_marcado_settings_group');
    do_settings_sections('cotizador-marcado-config');
    submit_button();

    echo '</div>';
}

// Callback para la sección de configuración
function cotizador_marcado_settings_section_callback() {
    echo '<p>' . __('Configura las opciones del cotizador de marcaje.', 'cotizador-marcado-plugin') . '</p>';
}

// Callback para el campo de selección de idioma
function cotizador_marcado_idioma_plugin_field_callback() {
    $idioma_plugin = get_option('idioma_plugin', 'es');
    ?>
    <select name="idioma_plugin">
        <option value="es" <?php selected('es', $idioma_plugin); ?>>Español</option>
        <option value="en" <?php selected('en', $idioma_plugin); ?>>English</option>
    </select>
    <?php
}

// Callback para el campo de técnicas de marcaje
function cotizador_marcado_tecnicas_marcaje_field_callback() {
    $tecnicas_marcaje = get_option('tecnicas_marcaje');
    ?>
    <input type="text" name="tecnicas_marcaje" value="<?php echo esc_attr($tecnicas_marcaje); ?>" />
    <?php
}

// Callback para el campo de mostrar tallas en el frontend
function cotizador_marcado_mostrar_tallas_field_callback() {
    $mostrar_tallas = get_option('mostrar_tallas', 0);
    ?>
    <input type="checkbox" name="mostrar_tallas" id="mostrar_tallas" value="1" <?php checked(1, $mostrar_tallas); ?>>
    <label for="mostrar_tallas"><?php echo esc_html__('Mostrar Tallas en el Frontend', 'cotizador-marcado-plugin'); ?></label>
    <?php
}

// Cargar estilos CSS
function cotizador_marcado_enqueue_styles() {
    wp_enqueue_style('cotizador-styles', plugin_dir_url(__FILE__) . 'assets/css/cotizador-styles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'cotizador_marcado_enqueue_styles');