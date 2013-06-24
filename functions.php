<?php

require_once('widgets/Seccion_Widget.php');

add_theme_support('menus');

if (function_exists('register_sidebar'))
{
    register_sidebar( array (
        'name' => __( 'Cultura Cuenca Sucesos', 'cultura-cuenca-sucesos' ),
        'id' => 'tricolccs',
        'description' => __( 'Cultura Cuenca Sucesos', 'dir' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array (
        'name' => __( 'Azuay Cañar Loja', 'azuay-canar-loja' ),
        'id' => 'tricolacl',
        'description' => __( 'Azuay Cañar Loja', 'dir' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}



add_post_type_support('page', 'excerpt');

function post_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case '' :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                    <?php echo get_avatar($comment, 40); ?>

                    <p class="comment-meta">
                        <?php printf(__('%s'), sprintf('%s', get_comment_author_link())); ?>

                        <a class="comment-date" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                            <?php printf(__('%1$s'), get_comment_date()); ?>
                        </a>

                        <?php if ($comment->comment_approved == '0') : ?>
                            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></em>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="comment-body"><?php comment_text(); ?></div>

                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
            </div>

            <?php
            break;
        case 'pingback'  :
        case 'trackback' :
            ?>

            <li class="post pingback">
            <p><?php _e('Pingback:'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)'), ' '); ?></p>
            <?php

            break;
    endswitch;
}

// Custom functions


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

function filter_where($where = '')
{
    $where .= " AND post_date <= '" . date('Y-m-d') . "'";
    return $where;
}

add_filter('posts_where', 'filter_where');

/**
 * Retorna una cadena con la noticia principal
 * @return string
 */
function get_noticia_principal()
{
    $args = array(
        'category_name' => 'principal',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $principal = query_posts($args);

    //remove_filter('posts_where', 'filter_where');

    $noticia = '';

    while (have_posts()) {
        the_post();
        $noticia .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
        $imagen = get_attachment_images(get_the_ID());
        $noticia .= '<img src="' . $imagen['imagen'][0] . '" width="730" height="344" alt="' . $imagen['attachment_meta']['alt'] . '" title="' . $imagen['attachment_meta']['title'] . '">';
        $noticia .= '<p>' . substr(get_the_content('', false), 0, 450) . '</p>';

    }
    wp_reset_query();

    return $noticia;
}


/**
 * * Retorna una cadena con 12 noticias de porstada
 * @return string
 */
function get_noticias_portada()
{

    $args = array(
        'category_name' => 'portada',
        'post_status' => 'publish',
        'posts_per_page' => 12

    );

    $portada = query_posts($args);

    $noticia_col_izq = '<div class="span6 noticia-secundaria"><ul class="thumbnails">';
    $noticia_col_der = '<div class="span6 noticia-secundaria"><ul class="thumbnails">';

    $izquierda = 0;
    $derecha = 0;

    while (have_posts()) {

        the_post();
        $imagen = get_attachment_images(get_the_ID());

        if ($izquierda <= 5) {
            $noticia_col_izq .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';

            $noticia_col_izq .= '<a href="' . get_permalink() . '">' . '<img class="img-cultura" style="width:295px;height:154px;" src="' . $imagen['imagen'][0] . '" ' . 'alt="' . get_the_title() . '" title="' . get_the_title() . '" >' . '</a>';
            $noticia_col_izq .= '<h3 style="height:65px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            //$noticia_col_izq .= '<p>' . substr(get_the_content('',false), 0,450) . '</p>';
            $noticia_col_izq .= '</div></li>';
            $izquierda++;
        } else if ($derecha <= 5 && $izquierda == 6) {
            $noticia_col_der .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';
            $noticia_col_der .= '<a href="' . get_permalink() . '">' . '<img class="img-cultura" style="width:295px;height:154px;" src="' . $imagen['imagen'][0] . '" ' . 'alt="' . get_the_title() . '" title="' . get_the_title() . '" >' . '</a>';
            $noticia_col_der .= '<h3 style="height:65px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            //$noticia_col_der .= '<p>' . substr(get_the_content('',false), 0,450) . '</p>';
            $noticia_col_der .= '</div></li>';
            $derecha++;
        }


    }
    $noticia_col_izq .= '</ul></div>';
    $noticia_col_der .= '</ul></div>';
    wp_reset_query();

    return $noticia_col_izq . $noticia_col_der;
}

function get_ultimas_noticias()
{

    $args = array('numberposts' => '15',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => array('portada', 'principal'),
                'operator' => 'NOT IN'
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => array('lo-ultimo')
            )
        ));

    $recent_posts = wp_get_recent_posts($args);
    $ultimas_noticias = '<ul class="nav nav-tabs nav-stacked">';
    foreach ($recent_posts as $recent) {
        $ultimas_noticias .= '<li><a href="' . get_permalink($recent["ID"]) . '" title="' . esc_attr($recent["post_title"]) . '" ><span class="label label-inverse">' . mysql2date('H:i', $recent["post_date"]) . '</span> ' . $recent["post_title"] . '</a> </li> ';
    }
    $ultimas_noticias .= '</ul>';
    return $ultimas_noticias;
}

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
 * Sacamos el numero de vecs que el post ha sido visto
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
 * Genera un string de las noticias mas leidas
 * @return string
 */
function get_mas_leidas()
{
    $popularpost = new WP_Query(
        array('posts_per_page' => 10,
            'meta_key' => 'wpb_post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => 'wpb_post_views_count',
                    'value' => '0',
                    'compare' => '!=',
                )
            )
        )
    );

    $mas_leidas = '<ul class="nav nav-tabs nav-stacked">';

    while ($popularpost->have_posts()) {
        $popularpost->the_post();
        $mas_leidas .= '<li><a href="' . get_permalink(get_the_ID()) . '" title="' . esc_attr(get_the_title()) . '" >' . get_the_title() . ' <span class="label label-warning">' . wpb_get_post_views(get_the_ID()) . '</span></a> </li> ';
    }

    $mas_leidas .= '</ul>';

    return $mas_leidas;
}

function get_portada_impresa()
{
    $args = array(
        'category_name' => 'impreso',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $portada_impresa = query_posts($args);
    $impreso = '';
    while (have_posts()) {

        the_post();

        $impreso = '<ul class="thumbnails" style="margin-top: 20px;">';
        $impreso .= '<li class="span12 thumbnail portada" style="text-align: center;"><h3>Portada</h3>';
        $impreso .= preg_replace('|\[(.+?)\](.+?\[/\\1\])?|s', '', get_the_content());
        //$impreso .= apply_filters('the_content', get_the_content());
        $impreso .= '</li></ul>';
    }

    return $impreso;
}



// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
//remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security

add_theme_support('post-thumbnails');
?>