<?php

class UltimasNoticias extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'ultimasnoticias_widget', // Base ID
            'M_Noticias: Ultimas Noticias', // Name
            array( 'description' => __( 'Listado de Ultima Noticias', 'text_domain' ), ) // Args
        );

        $this->max_noticias = 15;
    }

    public function widget( $args, $instance ) {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        global $post;

        extract( $args );


        $args = array('numberposts' => $instance['numberposts'],
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
        echo $ultimas_noticias;

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

register_widget('UltimasNoticias');

?>