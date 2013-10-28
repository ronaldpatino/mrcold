<?php

class NoticiaPrincipal extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'noticiaprincipal_widget', // Base ID
            'M_Noticias: Noticia Principal', // Name
            array( 'description' => __( 'Noticia principal, contiene cabecera, imagen grande y extracto', 'text_domain' ), ) // Args
        );

        $this->max_noticias = 1;
    }

    public function widget( $args, $instance ) {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}
        extract( $args );

        //add_filter('posts_where', 'filter_where');

        $args = array(
            'category_name' => 'principal',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'orderby'          => 'post_date',
            'order'            => 'DESC'
        );

         //query_posts($args);
        $posts_categoria = new WP_Query( $args );


        $noticia = '';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

            $noticia .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';

            $imagen = get_featured_image(get_the_ID());

            $src= getphpthumburl($imagen['imagen'][0], 'w=696&h=344&zc=1&q=90');

            $noticia .= '<a href="' . get_permalink() . '"><img src="' . $src . '" alt="' . get_the_title() . ' - ' . $imagen['attachment_meta']['alt'] . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . ' - ' .  $imagen['attachment_meta']['title'] . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay"></a>';

            $noticia .= '<p><a href="' . get_permalink() . '">'. get_summary(limpia_contenido(get_the_content('', false))) . '</a> </p>';

            $noticia .= '<hr/>';

        }
        wp_reset_postdata();
        //remove_filter('posts_where', 'filter_where');
        echo $noticia;

    }

    public function form( $instance )
    {
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['numberposts'] = strip_tags( $new_instance['numberposts'] );
        return $instance;
    }

    private function get_selected($numberposts, $post)
    {
        if ( $numberposts == $post )
        {
            return 'selected="selected"';
        }

        return '';

    }
}

register_widget('NoticiaPrincipal');
