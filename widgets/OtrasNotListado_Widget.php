<?php

class OtrasNotListado_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'otrasnotlistado_widget', // Base ID
            'M_Noticias: Secundarias Listado', // Name
            array( 'description' => __( 'Listado vertical de noticias sin imagenes', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        if ($instance['categoria'] == -1) {return;}

        global $post;

        extract( $args );

        $args = array( 'posts_per_page' => 6,
                        'offset'=> 1,
                        'category' => $instance['categoria'],
                        'post_status' => 'publish',
        );

        $posts_categoria = get_posts( $args );

        $category = get_the_category_by_ID($instance['categoria']);


        $primera_noticia = 0;

        $otras_noticia_listado = '<div class="span4 noticia-tricol sidebar"><ul class="nav nav-tabs nav-stacked">';

        foreach( $posts_categoria as $post ) {
            setup_postdata($post);
            $otras_noticia_listado .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }

        $otras_noticia_listado .= '</ul></div>';
        echo $otras_noticia_listado;
    }

    public function form( $instance )
    {
        $selected =  (isset($instance['categoria']) && $instance['categoria'] != -1)?$instance['categoria']:-1;

        $form  = '<p>';
        $form .= '<label for="' . $this->get_field_id( 'categoria' ) . '">'  . _e( 'Seccion:' ) . '</label>';
        $form .= wp_dropdown_categories(array('selected'=> $selected, 'show_option_none' => __('Ninguna'), 'hide_empty' => 0, 'id' => $this->get_field_id( 'categoria' ) ,'name' => $this->get_field_name( 'categoria' ), 'orderby' => 'name', 'hierarchical' => true, 'echo'=>0));
        $form .= '</p>';
        echo $form;
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['categoria'] = strip_tags( $new_instance['categoria'] );
        return $instance;
    }
}

register_widget('OtrasNotListado_Widget');

?>