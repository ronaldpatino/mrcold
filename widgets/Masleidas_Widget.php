<?php

class Masleidas extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'masleidas_widget', // Base ID
            'M_Noticias: Noticias Mas Leidas', // Name
            array( 'description' => __( 'Listado de Noticias mas leidas', 'text_domain' ), ) // Args
        );

        $this->max_noticias = 10;
    }

    public function widget( $args, $instance ) {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        global $post;

        extract( $args );


        $popularpost = new WP_Query(
            array('posts_per_page' => $instance['numberposts'],
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

        echo $mas_leidas;

    }

    public function form( $instance )
    {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        $form  = '<p>';
        $form .= '<label for="' . $this->get_field_id( 'numberposts' ) . '">'  . _e( 'Numero de noticias:' ) . '</label>';

        $form .= '<select id="' . $this->get_field_id( 'numberposts' ) . '" name="' . $this->get_field_name( 'numberposts' ) . '">';

        for($i=1; $i<=$this->max_noticias; $i++)
        {
            $form .= '<option value="' . $i . '" ' . $this->get_selected($instance['numberposts'],$i) . ' >' . $i . '</option>';
        }

        $form .= '</select>';

        $form .= '</p>';
        echo $form;
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

register_widget('Masleidas');

?>