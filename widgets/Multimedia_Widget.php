<?php

class Multimedia_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'multimedia_widget', // Base ID
            'M_Carrusel: Imagenes', // Name
            array('description' => __('Carrusel de Multimedia con un texto en la parte inferior', 'text_domain'),)
        );
    }

    public function widget($args, $instance)
    {

        if ($instance['categoria'] == -1) {
            return;
        }

        global $post;

        extract($args);

        $args = array(
        	'posts_per_page' => 11,
            'offset' => 0,
            'category' => $instance['categoria'],
            'post_status' => 'publish',
            'orderby'          => 'post_date',
            'order'            => 'DESC'
        );

        $posts_categoria = new WP_Query( $args );
        $category = str_replace(" ", "_", get_the_category_by_ID($instance['categoria']));
        $carussel_id = 'carrusel' . $category;
        $carrusel_modal = 'modal' . $category;
        $imagen_modal = 'imagen' . $category;

        $counter = 1;
        $activo = 1;

        $carrusel  = '<div class="carousel slide" id="'. $carussel_id .'">';
        $carrusel .= '<div class="carousel-inner">';


        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();


            if ($counter == 1) {
                if ($activo) {
                    $carrusel .= '<div class="item active">';
                    $activo = 0;
                } else {
                    $carrusel .= '<div class="item">';
                }

                $carrusel .= '<ul class="thumbnails sociales-thumbnails">';
            }
            //Loop 3
            $carrusel .= '<li class="span4">';
            $carrusel .= '<div class="thumbnail sociales-thumbnails-item">';
            $imagen = get_featured_image(get_the_ID());

            $carrusel .= '<a href="' . get_permalink() . '">' ;
            $carrusel .= '<img src="' . $imagen['imagen'][0] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
            $carrusel .= '</a>';
            $carrusel .= '<p>'. get_the_title() .'</p>';
            $carrusel .= '</div>';
            $carrusel .= '</li>';
            //Fin Loop 3


            if ($counter == 3) {
                $carrusel .= '</ul>';
                $carrusel .= '</div>';
                $counter = 1;
            } else {
                $counter++;
            }


        }

        if (count($posts_categoria) % 3 != 0) {
            $carrusel .= '</ul>';
            $carrusel .= '</div>';
        }

        $carrusel .= '</div>';


        $carrusel .= '<a data-slide="prev" href="#' . $carussel_id . '" class="left sociales-carousel-control">&lt;</a>';
        $carrusel .= '<a data-slide="next" href="#' . $carussel_id . '" class="right sociales-carousel-control">&gt;</a>';
        $carrusel .= '</div>';

        wp_reset_postdata();
        echo $carrusel;

    }

    public function form($instance)
    {
        $selected = (isset($instance['categoria']) && $instance['categoria'] != -1) ? $instance['categoria'] : -1;

        $form = '<p>';
        $form .= '<label for="' . $this->get_field_id('categoria') . '">' . _e('Seccion:') . '</label>';
        $form .= wp_dropdown_categories(array('selected' => $selected, 'show_option_none' => __('Ninguna'), 'hide_empty' => 0, 'id' => $this->get_field_id('categoria'), 'name' => $this->get_field_name('categoria'), 'orderby' => 'name', 'hierarchical' => true, 'echo' => 0));
        $form .= '</p>';
        echo $form;
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['categoria'] = strip_tags($new_instance['categoria']);
        return $instance;
    }
}

register_widget('Multimedia_Widget');

?>