<?php

class Opinion_Widget extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'opinion_widget', // Base ID
            'M_Opinion: Bloque Opinion', // Name
            array( 'description' => __( 'Opinion, Editorial ,columnistas', 'text_domain' ), ) // Args
        );

        $this->max_noticias = 1;
    }

    public function widget( $args, $instance ) {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        global $post;

        extract( $args );

        //add_filter('posts_where', 'filter_where');
        $args = array(
            'category_name' => 'columnistas',
            'post_status' => 'publish',
            'posts_per_page' => 6
        );

        $posts_categoria = new WP_Query( $args );
        $impreso = '';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

            $impreso .= '<h3>';
            $impreso .= '<a href="' . get_permalink() .'">';
            $impreso .= get_the_title();
            $impreso .= '</a>';
            $impreso .= '</h3>';
            $impreso .= '<p>';
            $impreso .=  substr(get_the_content('', false), 0, 110);
            $impreso .= '</p>';

            $impreso .= '<hr/>';
        }
        //remove_filter('posts_where', 'filter_where');
        wp_reset_postdata();
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

register_widget('Opinion_Widget');
