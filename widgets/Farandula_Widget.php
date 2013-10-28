<?php

class Farandula_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'Farandula_Widget', // Base ID
            'M_Farandula: Farandula', // Name
            array('description' => __('Farandula', 'text_domain'),)
        );

        $this->max_noticias = 7;
    }

    public function widget($args, $instance)
    {

        if ($instance['categoria'] == -1) {
            return;
        }

        global $post;

        extract($args);

        $categoria = get_category_by_slug('farandula-sociales');

        $args = array(
            'posts_per_page' => $this->max_noticias,
            'cat' =>  $categoria->term_id,
            'post_status' => 'publish',
            'orderby'          => 'post_date',
            'order'            => 'DESC'
        );

        $posts_categoria = new WP_Query( $args );


        $activo = 1;

        $farandula  = "<div id='farandulamain' class='carousel slide'>";

        $farandula .= '<div class="carousel-inner">';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

                if ($activo) {
                    $farandula .= '<div class="item active">';
                    $activo = 0;
                } else {
                    $farandula .= '<div class="item">';
                }

            $farandula .= '<ul class="thumbnails sociales-thumbnails">';

            //Loop 3
            $imagen = get_featured_image(get_the_ID());
            $src = getphpthumburl($imagen['imagen'][0], 'w=365&h=356&zc=1');
            $farandula .= "<li class='span12'>";


            $farandula .= '<a href="#carruselFarandula" data-caption=" ' . get_the_title() . '">';

            $farandula .= '<img class="img_farandula" src="' . $src . '" alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">';
            $farandula .= "<div class='carousel-caption carousel-caption_imagenes_noticia'>";
            $farandula .= '<p>' . get_the_title() . '</p>';
            $farandula .= '</div>';
            $farandula .= '</a>';
            $farandula .= "</li>";
            //Fin Loop 3
            $farandula .= '</ul>';
            $farandula .= '</div>';




        }
        wp_reset_postdata();


        $farandula .= '</div>';
        $farandula .= '<a data-slide="prev" href="#farandulamain"  class="left sociales-carousel-control">&lt;</a>';
        $farandula .= '<a data-slide="next" href="#farandulamain"  class="right sociales-carousel-control">&gt;</a>';
        $farandula .= '</div>';

        echo $farandula;

    }

    public function form($instance)
    {
        $selected = (isset($instance['categoria']) && $instance['categoria'] != -1) ? $instance['categoria'] : -1;

        $form = '<p>';
        $form .= "farandula";
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

register_widget('Farandula_Widget');
