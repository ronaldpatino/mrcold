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


add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
    $class = str_replace("class='avatar", "class='pull-left media-object", $class) ;
    return $class;
}


add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='btn btn-mini btn-primary", $class);
    return $class;
}


/***
 * @param $comment
 * @param $args
 * @param $depth
 *
 * Comentarios customizados
 */
function mrc_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    ?>
    <div class="media">

        <a class="pull-left" href="#"><?php echo get_avatar( $comment, '32' );?></a>

        <?php if ( '0' == $comment->comment_approved ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Su comentario ha sido enviado, pronto ser&acute; publicado.' ) ?></em>
            <br />
        <?php endif; ?>
        <div class="media-body">
            <h4 class="media-heading">
                <?php printf( __( '%s dijo el %1s - %2s:' ), get_comment_author_link(), get_comment_date('Y/m/d'), get_comment_time()) ?>
            </h4>
            <?php comment_text() ?>
            <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    <?php
}

/**
 *
 */
function mrc_comments_end()
{
    echo "</div></div>";
    return;
}


/**
 * @param array $args
 * @param null $post_id
 *
 * comment_form customizado, llamo esta funcion en lugar de comment_form en comment-template.php
 */
function mrc_comment_form( $args = array(), $post_id = null ) {
    if ( null === $post_id )
        $post_id = get_the_ID();
    else
        $id = $post_id;

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = 'html5' === $args['format'];
    $fields   =  array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
        'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
        '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    );

    $required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
    $defaults = array(
        'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
        'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'title_reply'          => __( 'Leave a Reply' ),
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Post Comment' ),
        'format'               => 'xhtml',
    );

    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

    ?>
    <?php if ( comments_open( $post_id ) ) : ?>
        <?php do_action( 'comment_form_before' ); ?>
        <div id="respond" class="comment-respond">
            <h3 id="reply-title" class="comment-reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
            <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
                <?php echo $args['must_log_in']; ?>
                <?php do_action( 'comment_form_must_log_in_after' ); ?>
            <?php else : ?>
                <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
                    <?php do_action( 'comment_form_top' ); ?>
                    <?php if ( is_user_logged_in() ) : ?>
                        <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                        <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
                    <?php else : ?>
                        <?php echo $args['comment_notes_before']; ?>
                        <?php
                        do_action( 'comment_form_before_fields' );
                        foreach ( (array) $args['fields'] as $name => $field ) {
                            echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                        }
                        do_action( 'comment_form_after_fields' );
                        ?>
                    <?php endif; ?>
                    <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
                    <?php echo $args['comment_notes_after']; ?>
                    <p class="form-submit">
                        <input class="btn btn-small btn-primary" name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                        <?php comment_id_fields( $post_id ); ?>
                    </p>
                    <?php do_action( 'comment_form', $post_id ); ?>
                </form>
            <?php endif; ?>
        </div><!-- #respond -->
        <?php do_action( 'comment_form_after' ); ?>
    <?php else : ?>
        <?php do_action( 'comment_form_comments_closed' ); ?>
    <?php endif; ?>
<?php
}
