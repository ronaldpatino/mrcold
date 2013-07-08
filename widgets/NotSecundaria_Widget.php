<?php

class NotSecundaria_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'notsecundaria_widget', // Base ID
            'M_Noticia: Secundaria de Seccion ', // Name
            array( 'description' => __( 'Noticia Secundaria de una Seccion', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        if ($instance['categoria'] == -1) {return;}

        global $post;

        extract( $args );

        $args = array( 'posts_per_page' => 1,
                        'offset'=> 1,
                        'category' => $instance['categoria'],
                        'post_status' => 'publish',
        );

        $posts_categoria = get_posts( $args );

        $category = get_the_category_by_ID($instance['categoria']);


        $primera_noticia = 0;

        $noticia_principal_seccion = '';

        foreach( $posts_categoria as $post ) {
            setup_postdata($post);

            $noticia_principal_seccion  .= '<div class="span4 noticia-tricol">';
            $noticia_principal_seccion .= '<ul class="thumbnails">';
            $noticia_principal_seccion .= '<li class="span12">';
            $noticia_principal_seccion .= '<div class="thumbnail thumbnail-custom">';
            $noticia_principal_seccion .= '<h3>' . get_the_title() . '</h3>';
            $imagen = get_attachment_images(get_the_ID());
            $noticia_principal_seccion .= '<img src="' . $imagen['imagen'][0] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
            /*330 * 154*/
            $noticia_principal_seccion .= '<p>' . substr(get_the_content('', false), 0, 450) . '</p>';
            $noticia_principal_seccion .= '</div></li></ul></div>';

        }


        echo $noticia_principal_seccion;

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

register_widget('NotSecundaria_Widget');

?>