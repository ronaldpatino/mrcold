<?php
/**
 * Class NotSecundariaLista
 * Las noticias marcadas como destacadas (16) no seran mostradas
 */
class NotSecundariaLista extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'notsecundarialista_widget', // Base ID
            'M_Noticia: Secundaria Lista Imagenes', // Name
            array( 'description' => __( 'Listado Vertical de noticias con una imagenes pequeña a la izquierda y texto a la derecha', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        if ($instance['categoria'] == -1) {return;}

        extract( $args );

        $args = array( 'posts_per_page' => 5,
                        'offset'=> 0,
                        'orderby'  => 'post_date',
                        'order' => 'DESC',
                        'cat' => $instance['categoria'],
                        'category__not_in' => array( 16 ),
                        'post_status' => 'publish',
        );

        $posts_categoria = new WP_Query( $args );

        $category = get_the_category_by_ID($instance['categoria']);

        $noticia_secundaria_lista_seccion = '<div class="span4 noticia-tricol">';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();


            $noticia_secundaria_lista_seccion .= '<div class="media ml2p">';
            $noticia_secundaria_lista_seccion .= '<a class="pull-left" href="' . get_permalink() .'">';
            $imagen = get_featured_image(get_the_ID());
            $src= getphpthumburl($imagen['imagen'][0], 'w=120&h=74&zc=1&q=90');
            $noticia_secundaria_lista_seccion .= '<img src="' . $src . '" alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">';
            $noticia_secundaria_lista_seccion .= '</a>';
            $noticia_secundaria_lista_seccion .= '<div class="media-body media-body-tricol">' .'<a href="' . get_permalink() .'">' . get_the_title() . '</a></div>';
            $noticia_secundaria_lista_seccion .= '</div>';

        }

        wp_reset_postdata();
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