<?php

class NotSecundariaLista extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'notsecundaria_widget', // Base ID
            'Noticia Secundaria Lista Imagenes Seccion', // Name
            array( 'description' => __( 'Noticia Secundaria Seccion Listado Vertical Imagenes', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        if ($instance['categoria'] == -1) {return;}

        global $post;

        extract( $args );

        $args = array( 'posts_per_page' => 3,
                        'offset'=> 1,
                        'category' => $instance['categoria'],
                        'post_status' => 'publish',
        );

        $posts_categoria = get_posts( $args );

        $category = get_the_category_by_ID($instance['categoria']);

        $noticia_secundaria_lista_seccion = '<div class="span4 noticia-tricol">';

        foreach( $posts_categoria as $post ) {
            setup_postdata($post);

            $noticia_secundaria_lista_seccion .= '<div class="media ml2p">';
            $noticia_secundaria_lista_seccion .= '<a class="pull-left" href="' . get_permalink() .'">';
            $imagen = get_attachment_images(get_the_ID());
            $noticia_secundaria_lista_seccion .= '<img src="' . $imagen['imagen'][0] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
            /*120*74*/
            $noticia_secundaria_lista_seccion .= '</a>';
            $noticia_secundaria_lista_seccion .= '<div class="media-body media-body-tricol">' . get_the_title() . '</div>';
            $noticia_secundaria_lista_seccion .= '</div>';

        }
        $noticia_secundaria_lista_seccion .= '</div>';

        echo $noticia_secundaria_lista_seccion;

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

register_widget('NotSecundariaLista');

?>