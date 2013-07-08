<?php

class NoticiasPortada extends WP_Widget {

    private $max_noticias;
    public function __construct() {
        parent::__construct(
            'ultimasnoticias_widget', // Base ID
            'M_Noticias: Noticias de Portada', // Name
            array( 'description' => __( 'Listado de dos coluna de Noticias de Portada con foto tamaño mediano, las noticias de este listado son pares ya que se muestran en dos columnas', 'text_domain' ), ) // Args
        );

        $this->max_noticias = 12;
    }

    public function widget( $args, $instance ) {

        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        global $post;

        extract( $args );


        $args = array(
            'category_name' => 'portada',
            'post_status' => 'publish',
            'posts_per_page' => $instance['numberposts']
        );

        $portada = query_posts($args);

        $noticia_col_izq = '<div class="span6 noticia-secundaria"><ul class="thumbnails">';
        $noticia_col_der = '<div class="span6 noticia-secundaria"><ul class="thumbnails">';

        $izquierda = 0;
        $derecha = 0;

        while (have_posts()) {

            the_post();
            $imagen = get_attachment_images(get_the_ID());

            if ($izquierda <= 5) {
                $noticia_col_izq .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';

                $noticia_col_izq .= '<a href="' . get_permalink() . '">' . '<img class="img-cultura" style="width:295px;height:154px;" src="' . $imagen['imagen'][0] . '" ' . 'alt="' . get_the_title() . '" title="' . get_the_title() . '" >' . '</a>';
                $noticia_col_izq .= '<h3 style="height:65px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
                //$noticia_col_izq .= '<p>' . substr(get_the_content('',false), 0,450) . '</p>';
                $noticia_col_izq .= '</div></li>';
                $izquierda++;
            } else if ($derecha <= 5 && $izquierda == 6) {
                $noticia_col_der .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';
                $noticia_col_der .= '<a href="' . get_permalink() . '">' . '<img class="img-cultura" style="width:295px;height:154px;" src="' . $imagen['imagen'][0] . '" ' . 'alt="' . get_the_title() . '" title="' . get_the_title() . '" >' . '</a>';
                $noticia_col_der .= '<h3 style="height:65px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
                //$noticia_col_der .= '<p>' . substr(get_the_content('',false), 0,450) . '</p>';
                $noticia_col_der .= '</div></li>';
                $derecha++;
            }


        }
        $noticia_col_izq .= '</ul></div>';
        $noticia_col_der .= '</ul></div>';
        wp_reset_query();

        echo $noticia_col_izq . $noticia_col_der;

    }

    public function form( $instance )
    {
        if (!isset($instance['numberposts'])) {$instance['numberposts']= $this->max_noticias;}

        $form  = '<p>';
        $form .= '<label for="' . $this->get_field_id( 'numberposts' ) . '">'  . _e( 'Numero de noticias:' ) . '</label>';

        $form .= '<select id="' . $this->get_field_id( 'numberposts' ) . '" name="' . $this->get_field_name( 'numberposts' ) . '">';

        for($i=2; $i<=$this->max_noticias; $i+=2)
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

register_widget('NoticiasPortada');

?>