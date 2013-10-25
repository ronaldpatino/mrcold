<?php

class NoticiaPrincipal extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'noticiaprincipal_widget', // Base ID
            'M_Noticias: Noticia Principal', // Name
            array( 'description' => __( 'Noticia principal, contiene cabecera, imagen grande y extrato', 'text_domain' ), ) // Args
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
            'posts_per_page' => 1
        );

         //query_posts($args);
        $posts_categoria = new WP_Query( $args );


        $noticia = '';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

            $noticia .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            $imagen = get_featured_image(get_the_ID());

            $noticia .= '<img src="' . $imagen['imagen'][0] . '" width="730" height="344" alt="' . $imagen['attachment_meta']['alt'] . '" title="' . $imagen['attachment_meta']['title'] . '">';

            $noticia .= '<p>' . substr(limpia_contenido(get_the_content('', false)), 0, 450) . '</p>';

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
