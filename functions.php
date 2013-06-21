<?php

add_theme_support( 'menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

add_post_type_support('page', 'excerpt');

function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>

			<p class="comment-meta">
				<?php printf( __( '%s' ), sprintf( '%s', get_comment_author_link() ) ); ?>
    
                <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php printf( __( '%1$s' ), get_comment_date() ); ?>
                </a> 
                
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                <?php endif; ?>
            </p>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	<?php

		break;
	endswitch;
}

// Custom functions


function get_clima()
{
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
        )
    );

    $context = stream_context_create($opts);

    $html = file_get_contents('http://www.meteored.com.ec/getwid/e4085e7778f2d5fe273a9a0651f87a1e', false, $context);
    $doc = new DOMDocument();
    @$doc->loadHTML($html);

    $tags = $doc->getElementsByTagName('img');

    foreach ($tags as $tag) {
        $items[] = $tag->getAttribute('src');

    }

    $tags = $doc->getElementsByTagName('font');

    foreach ($tags as $tag) {
        $temp[] = str_replace("Â", "", $tag->nodeValue);
    }

    $clima_tag = "&nbsp;&nbsp;<img title='El Mercurio - El Clima en Cuenca' alt='El Mercurio - El Clima en Cuenca' class='' src='{$items[2]}'> {$temp[0]} / {$temp[1]}";

    echo $clima_tag;
}

function get_fecha()
{
    $dia = "";
    switch (date("w"))
    {
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
    switch (date("n"))
    {
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

    $fecha =  "Cuenca  {$dia}, " . date("d") . " de {$mes} " . date("Y");

    echo $fecha;
}

function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}


/***
 * @param $id
 * @return array()
 */
function get_attachment_images($id) {
    $args = array(
        'post_type' => 'attachment',
        'numberposts' => -1,
        'post_status' => null,
        'post_parent' =>  $id
    );

    $attachments = get_posts( $args );

    if ( $attachments ) {
        $attachment_images['imagen'] =  wp_get_attachment_image_src( $attachments[0]->ID, array(730,344) );
        $attachment_images['attachment_meta'] = wp_get_attachment($attachments[0]->ID);

    }
    else
    {
        $attachment_images['imagen'] = null;
        $attachment_images['attachment_meta'] = null;
    }

    return $attachment_images;
}




/*Noticia principal*/

function filter_where($where = '') {
    $where .= " AND post_date >= '" . date('Y-m-d') . "'";
    return $where;
}
add_filter('posts_where', 'filter_where');

function get_noticia_principal() {
    $args = array(
        'category_name' => 'principal',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $principal = query_posts($args);

    //remove_filter('posts_where', 'filter_where');

    $noticia = '';

    while ( have_posts() ){
        the_post();
        $noticia .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
        $imagen = get_attachment_images(get_the_ID());
        $noticia .= '<img src="' . $imagen['imagen'][0] . '" width="730" height="344" alt="' . $imagen['attachment_meta']['alt'] . '" title="' . $imagen['attachment_meta']['title'] . '">';
        $noticia .= '<p>' . substr(get_the_content(), 0,450)  . '</p>';

    }
    wp_reset_query();

    return $noticia;
}

function get_noticias_portada() {

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

    while ( have_posts() ){

        the_post();
        $imagen = get_attachment_images(get_the_ID());

        if ($izquierda <= 5)
        {
            $noticia_col_izq .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';
            $noticia_col_izq .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            $noticia_col_izq .= '<img class="img-cultura" style="width:295px;height:154px;" src="' . $imagen['imagen'][0].'" ' . 'alt="' . $imagen['attachment_meta']['alt'] . '" title="' . $imagen['attachment_meta']['title']. '" >';
            $noticia_col_izq .= '<p>' . substr(get_the_content('',false), 0,450) . '</p>';
            $noticia_col_izq .= '</div></li>';
            $izquierda++;
        }
        else if ($derecha<=5 && $izquierda == 6)
        {
            $noticia_col_der .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';
            $noticia_col_der .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            $noticia_col_der .= '<img class="img-cultura" style="width:295px;height:154px;" src="' . $imagen['imagen'][0].'" ' . 'alt="' . $imagen['attachment_meta']['alt'] . '" title="' . $imagen['attachment_meta']['title']. '" >';
            $noticia_col_der .= '<p>' . substr(get_the_content('',false), 0,450) . '</p>';
            $noticia_col_der .= '</div></li>';
            $derecha++;
        }


    }
    $noticia_col_izq .= '</ul></div>';
    $noticia_col_der .= '</ul></div>';
    wp_reset_query();

    return $noticia_col_izq . $noticia_col_der;
}



// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
//remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security

add_theme_support('post-thumbnails');
?>