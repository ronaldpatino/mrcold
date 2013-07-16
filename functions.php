<?php

require_once('widgets/Seccion_Widget.php');
require_once('widgets/NotPrincipal_Widget.php');
require_once('widgets/NotSecundariaLista_Widget.php');
require_once('widgets/OtrasNotListado_Widget.php');
require_once('widgets/Carrusel_Widget.php');
require_once('widgets/UltimasNoticias_Widget.php');
require_once('widgets/MasLeidas_Widget.php');
require_once('widgets/NoticiasPortada_Widget.php');
require_once('widgets/NoticiaPrincipal_Widget.php');
require_once('widgets/PortadaImpresa_Widget.php');
require_once('widgets/Caricatura_Widget.php');


if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Noticia Principal y  Titulares', 'portada_titulares' ),
        'id' => 'portada_titulares',
        'description' => __( 'Noticia Principal y Titulares', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Ultimas Noticias, Mas Leidas, Portada Impresa', 'ultimas_masleidas_portada' ),
        'id' => 'ultimas_masleidas_portada',
        'description' => __( 'Ultimas Noticias, Mas Leidas, Portada Impresa', 'dir' )
    ) );
}


if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Cultura Cuenca Sucesos', 'cultura-cuenca-sucesos' ),
        'id' => 'tricolccs',
        'description' => __( 'Cultura Cuenca Sucesos', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{

        register_sidebar( array (
        'name' => __( 'Azuay Cañar Loja', 'azuay-canar-loja' ),
        'id' => 'tricolacl',
        'description' => __( 'Azuay Cañar Loja', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Deportes', 'deportes' ),
        'id' => 'tricoldeportes',
        'description' => __( 'Deportes', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Deportivo Cuenca', 'deportivocuenca' ),
        'id' => 'deportivocuenca',
        'description' => __( 'Deportivo Cuenca', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Sociales', 'sociales' ),
        'id' => 'sociales',
        'description' => __( 'Sociales', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Multimedia', 'multimedia' ),
        'id' => 'multimedia',
        'description' => __( 'Multimedia', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Suplementos', 'suplemementos' ),
        'id' => 'suplementos',
        'description' => __( 'Suplementos', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Caricatura', 'caricatura' ),
        'id' => 'caricatura',
        'description' => __( 'Caricatura', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Cabecera', 'publicidadcabecera' ),
        'id' => 'publicidadcabecera',
        'description' => __( 'Bloque Cabecera', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Mas Leidas', 'publicidadmasleidas' ),
        'id' => 'publicidadmasleidas',
        'description' => __( 'Publicidad Mas Leidas', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Titulares', 'publicidadtitulares' ),
        'id' => 'publicidadtitulares',
        'description' => __( 'Publicidad Titulares', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Sociales', 'publicidadsociales' ),
        'id' => 'publicidadsociales',
        'description' => __( 'Publicidad Sociales', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Deportivo Cuenca', 'publicidad_deportivo_cuenca' ),
        'id' => 'publicidad_deportivo_cuenca',
        'description' => __( 'Publicidad Deportivo Cuenca', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Multimedia', 'publicidad_multimedia' ),
        'id' => 'publicidad_multimedia',
        'description' => __( 'Publicidad Multimedia', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Suplementos', 'publicidad_suplementos' ),
        'id' => 'publicidad_suplementos',
        'description' => __( 'Publicidad Suplementos', 'dir' )
    ) );
}

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Publicidad Pie de Pagina', 'publicidadpie' ),
        'id' => 'publicidadpie',
        'description' => __( 'Publicidad Pie', 'dir' )
    ) );
}



/***
 * Retorna la fecha formateada
 * @return string
 */
function get_fecha()
{
    $dia = "";
    switch (date("w")) {
        case 0:
            $dia = "Domingo";
            break;
        case 1:
            $dia = "Lunes";
            break;
        case 2:
            $dia = "Martes";
            break;
        case 3:
            $dia = "Mi&eacute;rcoles";
            break;
        case 4:
            $dia = "Jueves";
            break;
        case 5:
            $dia = "Viernes";
            break;
        case 6:
            $dia = "S&aacute;bado";
            break;
    }

    $mes = "";
    switch (date("n")) {
        case 1:
            $mes = "Enero";
            break;
        case 2:
            $mes = "Febrero";
            break;
        case 3:
            $mes = "Marzo";
            break;
        case 4:
            $mes = "Abril";
            break;
        case 5:
            $mes = "Mayo";
            break;
        case 6:
            $mes = "Junio";
            break;
        case 7:
            $mes = "Julio";
            break;
        case 8:
            $mes = "Agosto";
            break;
        case 9:
            $mes = "Septiembre";
            break;
        case 10:
            $mes = "Octubre";
            break;
        case 11:
            $mes = "Noviembre";
            break;
        case 12:
            $mes = "Diciembre";
            break;
    }

    $fecha = "Cuenca  {$dia}, " . date("d") . " de {$mes} " . date("Y");

    return $fecha;
}

/**
 * Retorna un array con los attachments del post
 * @param $attachment_id
 * @return array
 */
function wp_get_attachment($attachment_id)
{

    $attachment = get_post($attachment_id);
    return array(
        'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink($attachment->ID),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}


/***
 * Retorna un arrar con la imagen adjunta al post
 * @param $id
 * @return array()
 */
function get_attachment_images($id)
{
    $args = array(
        'post_type' => 'attachment',
        'numberposts' => -1,
        'post_status' => null,
        'post_parent' => $id
    );

    $attachments = get_posts($args);

    if ($attachments) {
        $attachment_images['imagen'] = wp_get_attachment_image_src($attachments[0]->ID, array(730, 344));
        $attachment_images['attachment_meta'] = wp_get_attachment($attachments[0]->ID);

    } else {
        $attachment_images['imagen'] = array( get_bloginfo('template_url') . '/assets/img/placeholder.png');
        $attachment_images['attachment_meta'] = null;
    }

    return $attachment_images;
}


/*Noticia principal*/
/**
 * Filtro para fecha en los posts
 * @param string $where
 * @return string
 */
function filter_where($where = '')
{
    $where .= " AND post_date <= '" . date('Y-m-d') . "'";
    return $where;
}

add_filter('posts_where', 'filter_where');


/**
 * Registramos en la metadata del post un contador de visitas
 * @param $postID
 */
function wpb_set_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Sacamos el numero de veces que el post ha sido visto
 * @param $postID
 * @return string
 */
function wpb_get_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

/**
 * Limpiamos el contendido del post de html y codigo markup de wp
 * @param $texto
 */
function limpia_contenido($texto){

    $retorno = strip_tags($texto);
    $retorno =  strip_shortcodes($retorno);

    return $retorno;
}



// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security

add_theme_support('post-thumbnails');
?>