<?php

class NoticiasPortada extends WP_Widget
{

    private $max_noticias;

    public function __construct()
    {
        parent::__construct(
            'noticiasportada_widget', // Base ID
            'M_Noticias: Noticias de Portada', // Name
            array('description' => __('Listado de dos coluna de Noticias de Portada con foto tamaño mediano, las noticias de este listado son pares ya que se muestran en dos columnas', 'text_domain'),) // Args
        );

        $this->max_noticias = 12;
    }

    public function widget($args, $instance)
    {

        if (!isset($instance['numberposts'])) {
            $instance['numberposts'] = $this->max_noticias;
        }

        extract($args);

        $categoria = get_category_by_slug('principal');
        $portada = get_category_by_slug('portada');

        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => $instance['numberposts'],
            'category__not_in' => $categoria->term_id,
            'cat' => $portada->term_id,
            'orderby' => 'post_date',
            'order' => 'DESC'
        );


        //add_filter('posts_where', 'filter_where');
        $posts_categoria = new WP_Query($args);

        $noticia_col_izq = '<div class="span6 noticia-secundaria"><ul class="thumbnails">';
        $noticia_col_der = '<div class="span6 noticia-secundaria"><ul class="thumbnails">';

        $izquierda = 0;
        $derecha = 0;

        while ($posts_categoria->have_posts()) {
            $posts_categoria->the_post();
            $imagen = get_featured_image(get_the_ID());

            if ($izquierda <= 5) {
                $noticia_col_izq .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';

                $src= getphpthumburl($imagen['imagen'][0], 'w=295&h=154&zc=1');
                
                $noticia_col_izq .= '<a href="' . get_permalink() . '">' . '<img class="img-cultura"  src="' . $src . '" ' . 'alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" >' . '</a>';
                $noticia_col_izq .= '<h3 style="height:65px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
                $noticia_col_izq .= '</div></li>';
                $izquierda++;

            } else if ($derecha <= 5 && $izquierda == 6) {

                $src= getphpthumburl($imagen['imagen'][0], 'w=295&h=154&zc=1');
                $noticia_col_der .= '<li class="span12 nomargen-abajo"><div class="thumbnail thumbnail-custom">';
                $noticia_col_der .= '<a href="' . get_permalink() . '">' . '<img class="img-cultura"  src="' . $src . '" ' . 'alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" >' . '</a>';
                $noticia_col_der .= '<h3 style="height:65px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
                $noticia_col_der .= '</div></li>';
                $derecha++;
            }


        }
        wp_reset_query();
        
        $noticia_col_izq .= '</ul></div>';
        $noticia_col_der .= '</ul></div>';

        //remove_filter('posts_where', 'filter_where');
        echo '<div class="row-fluid">' . $noticia_col_izq . $noticia_col_der . '</div>';

    }

    public function form($instance)
    {
        if (!isset($instance['numberposts'])) {
            $instance['numberposts'] = $this->max_noticias;
        }

        $form = '<p>';
        $form .= '<label for="' . $this->get_field_id('numberposts') . '">' . _e('Numero de noticias:') . '</label>';

        $form .= '<select id="' . $this->get_field_id('numberposts') . '" name="' . $this->get_field_name('numberposts') . '">';

        for ($i = 2; $i <= $this->max_noticias; $i += 2) {
            $form .= '<option value="' . $i . '" ' . $this->get_selected($instance['numberposts'], $i) . ' >' . $i . '</option>';
        }

        $form .= '</select>';

        $form .= '</p>';
        echo $form;
    }

    private function get_selected($numberposts, $post)
    {
        if ($numberposts == $post) {
            return 'selected="selected"';
        }

        return '';

    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['numberposts'] = strip_tags($new_instance['numberposts']);
        return $instance;
    }
}

register_widget('NoticiasPortada');

?>