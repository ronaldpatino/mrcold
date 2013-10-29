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


        extract( $args );

        //add_filter('posts_where', 'filter_where');
        $args = array(
            'category_name' => 'impreso',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'orderby'          => 'post_date',
            'order'            => 'DESC'
        );

        $posts_categoria = new WP_Query( $args );

        $impreso = '';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

            $impreso = '<ul class="thumbnails" style="margin-top: 20px;">';
            $impreso .= '<li class="span12 thumbnail portada" style="text-align: center;"><h3>Portada</h3>';
            $imagen = get_featured_image(get_the_ID());
            $src= getphpthumburl($imagen['imagen'][0], 'w=276&q=95');
            //$impreso .= '<a href="' . get_permalink() . '">' . '<img src="' . $src . '" alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">' . '</a>';
            $impreso .= '<img src="' . $src . '" alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">';
            $impreso .= '</li></ul>';
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

register_widget('PortadaImpresa');

?>