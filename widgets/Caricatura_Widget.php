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
    }

    public function widget($args, $instance)
    {

        if ($instance['categoria'] == -1) {
            return;
        }

        global $post;

        extract($args);

        $args = array('posts_per_page' => 12,
            'offset' => 1,
            'category' => 'caricaturas',
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


            $caricatura .= "<img alt='' class='caricatura' src='". get_bloginfo('template_url') . "/assets/img/1.jpg'>";
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

?>