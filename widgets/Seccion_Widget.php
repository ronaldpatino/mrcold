<?php

class Seccion_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'seccion_widget', // Base ID
            'M_Noticias: Seccion Noticias', // Name
            array( 'description' => __( 'Una noticia con una imagen grande y tres noticias alineadas a la derecha con una imagen pequeña cada una alineada a la izquierda, en sentido vertical', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        if ($instance['categoria'] == -1) {return;}

        extract( $args );
        $category = get_the_category_by_ID($instance['categoria']);

        //add_filter('posts_where', 'filter_where');
        $args = array( 'posts_per_page' => 4,

                        'offset'=> 1,
                        'cat'=> $instance['categoria'],
                        'post_status' => 'publish',
        );

        $posts_categoria = new WP_Query( $args );
        $post_imprimir  = '<div class="span4 noticia-tricol">';
        $post_imprimir .= '<h2 class="cultura"><a href="' . get_home_url() . '/'. strtolower($category) . '">' . $category . '</a></h2>';
        $primera_noticia = 0;


        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

            if (!$primera_noticia)
            {
                $post_imprimir .= '<ul class="thumbnails">';
                $post_imprimir .= '<li class="span12"><div class="thumbnail thumbnail-custom"><h3>';
                $post_imprimir .= '<a href="' . get_permalink() .'">' . get_the_title() . '</a></h3>';
                $imagen = get_featured_image(get_the_ID());
                $src= getphpthumburl($imagen['imagen'][0], 'w=332&h=260&zc=1');
                $post_imprimir  .= '<a href="' . get_permalink() .'">' . '<img src="' . $src . '" alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">' . '</a>';
                $post_imprimir .= '<p>' . '<a href="' . get_permalink() .'">' . get_summary(limpia_contenido(get_the_content('', false)),90) . '</a>' . '</p>';
                $post_imprimir .= '</div></li></ul>';
                $primera_noticia = 1;
            }
            else
            {
                $post_imprimir .= '<div class="media ml2p">';
                $post_imprimir .= '<a class="pull-left" href="'. get_permalink() .'">';
                $imagen = get_featured_image(get_the_ID());
                $src= getphpthumburl($imagen['imagen'][0], 'w=120&h=74&zc=1');
                $post_imprimir  .= '<img src="' . $src . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
                $post_imprimir .= '</a>';
                $post_imprimir .= '<div class="media-body media-body-tricol">' . '<a class="pull-left" href="'. get_permalink() .'">' . get_the_title() . '</a></div>';
                $post_imprimir .= '</div>';
            }
        }

        //remove_filter('posts_where', 'filter_where');
        wp_reset_postdata();

        $post_imprimir .= '<br/></div>';
        echo $post_imprimir;

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

register_widget('Seccion_Widget');

?>