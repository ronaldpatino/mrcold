<?php

class Caricatura_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'caricatura_widget', // Base ID
            'M_Caricatura: Caricatura', // Name
            array('description' => __('Caricaturas', 'text_domain'),)
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

        $categoria = get_category_by_slug('caricaturas');
        $args = array(
            'posts_per_page' => $this->max_noticias,
            'offset' => 1,
            'category' =>  $categoria->term_id,
            'post_status' => 'publish',
        );

        $posts_categoria = get_posts($args);


        $activo = 1;

        $caricatura  = "<div id='caricaturamain' class='carousel slide'>";

        $caricatura .= '<div class="carousel-inner">';

        foreach ($posts_categoria as $post) {

            setup_postdata($post);
                if ($activo) {
                    $caricatura .= '<div class="item active">';
                    $activo = 0;
                } else {
                    $caricatura .= '<div class="item">';
                }

            $caricatura .= '<ul class="thumbnails sociales-thumbnails">';

            //Loop 3
            $imagen = get_attachment_images(get_the_ID());

            $caricatura .= "<li class='span12'>";


            $caricatura .= '<a href="#carruselCaricatura" data-caption=" ' . get_the_title() . '"  data-img=" ' . $imagen['imagen'][0] . '" data-toggle="modal">';
            $caricatura .= '<img class="img_caricatura" src="' . $imagen['imagen'][0] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
            $caricatura .= '</a>';
            $caricatura .= "</li>";
            //Fin Loop 3
            $caricatura .= '</ul>';
            $caricatura .= '</div>';




        }



        $caricatura .= '</div>';
        $caricatura .= '<a data-slide="prev" href="#caricaturamain"  class="left sociales-carousel-control">&lt;</a>';
        $caricatura .= '<a data-slide="next" href="#caricaturamain"  class="right sociales-carousel-control">&gt;</a>';
        $caricatura .= '</div>';

        echo $caricatura;

    }

    public function form($instance)
    {
        $selected = (isset($instance['categoria']) && $instance['categoria'] != -1) ? $instance['categoria'] : -1;

        $form = '<p>';
        $form .= "Caricatura";
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

register_widget('Caricatura_Widget');
