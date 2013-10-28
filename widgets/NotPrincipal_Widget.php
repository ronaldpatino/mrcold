<?php

/**
 * Class NotPrincipal_Widget
 * Todas las notas marcadas como 16 (destacadas) serán motradas en este contexto
 */

class NotPrincipal_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'notprincipal_widget', // Base ID
            'M_Noticia: Principal de Seccion', // Name
            array( 'description' => __( 'Contiene una cabecera, una imagen grande y un extracto de la noticia', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        if ($instance['categoria'] == -1) {return;}

        extract( $args );

        //Categoria 16 destacados
        $args = array( 'posts_per_page' => 1,
                        'offset'=> 1,
                        'category__and' => array($instance['categoria'],16),
                        'post_status' => 'publish',
                        'orderby'          => 'post_date',
                        'order'            => 'DESC'
        );

        $posts_categoria = new WP_Query( $args );


        $noticia_principal_seccion = '';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

            $noticia_principal_seccion  .= '<div class="span4 noticia-tricol">';
            $noticia_principal_seccion .= '<ul class="thumbnails">';
            $noticia_principal_seccion .= '<li class="span12">';
            $noticia_principal_seccion .= '<div class="thumbnail thumbnail-custom">';
            $noticia_principal_seccion .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            $imagen = get_featured_image(get_the_ID());
            $src= getphpthumburl($imagen['imagen'][0], 'w=345&h=260&zc=1&q=90');
            $noticia_principal_seccion .= '<a href="' . get_permalink() . '">' . '<img src="' . $src . '" alt="' . get_the_title() . 'alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">' . '</a>';
            /*330 * 154*/
            $noticia_principal_seccion .= '<p>' . '<a href="' . get_permalink() . '">' . get_summary(limpia_contenido(get_the_content('', false)), 100) . '' . '</p>';
            $noticia_principal_seccion .= '</div></li></ul></div>';

        }

        wp_reset_postdata();
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

register_widget('NotPrincipal_Widget');

?>