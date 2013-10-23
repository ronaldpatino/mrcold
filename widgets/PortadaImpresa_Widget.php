<?php

class PortadaImpresa extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'portadaimpresa_widget', // Base ID
            'M_Noticias: Portada Impresa', // Name
            array( 'description' => __( 'Imagen de la portada del día', 'text_domain' ), ) // Args
        );

        $this->max_noticias = 1;
    }

    public function widget( $args, $instance ) {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        global $post;

        extract( $args );

        //add_filter('posts_where', 'filter_where');
        $args = array(
            'category_name' => 'impreso',
            'post_status' => 'publish',
            'posts_per_page' => 1
        );

        query_posts($args);
        $impreso = '';
        while (have_posts()) {

            the_post();

            $impreso = '<ul class="thumbnails" style="margin-top: 20px;">';
            $impreso .= '<li class="span12 thumbnail portada" style="text-align: center;"><h3>Portada</h3>';
            $impreso .= preg_replace('|\[(.+?)\](.+?\[/\\1\])?|s', '', get_the_content());
            //$impreso .= apply_filters('the_content', get_the_content());
            $impreso .= '</li></ul>';
        }
        //remove_filter('posts_where', 'filter_where');
        echo $impreso;

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


}

register_widget('PortadaImpresa');

?>