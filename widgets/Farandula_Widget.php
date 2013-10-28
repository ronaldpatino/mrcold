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

        $caricatura  = "<div id='caricaturamain' class='carousel slide'>";

        $caricatura .= '<div class="carousel-inner">';

        while ( $posts_categoria->have_posts() )
        {
            $posts_categoria->the_post();

                if ($activo) {
                    $caricatura .= '<div class="item active">';
                    $activo = 0;
                } else {
                    $caricatura .= '<div class="item">';
                }

            $caricatura .= '<ul class="thumbnails sociales-thumbnails">';

            //Loop 3
            $imagen = get_featured_image(get_the_ID());

            $caricatura .= "<li class='span12'>";


            $caricatura .= '<a href="#carruselFarandula" data-caption=" ' . get_the_title() . '"  data-img=" ' . $imagen['imagen'][0] . '" data-toggle="modal">';
            $caricatura .= '<img class="img_caricatura" src="' . $imagen['imagen'][0] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
            $caricatura .= "<div class='carousel-caption carousel-caption_imagenes_noticia'>";
            $caricatura .= '<p>' . get_the_title() . '</p>';
            $caricatura .= '</div>';
            $caricatura .= '</a>';
            $caricatura .= "</li>";
            //Fin Loop 3
            $caricatura .= '</ul>';
            $caricatura .= '</div>';




        }
        wp_reset_postdata();


        $caricatura .= '</div>';
        $caricatura .= '<a data-slide="prev" href="#caricaturamain"  class="left sociales-carousel-control">&lt;</a>';
        $caricatura .= '<a data-slide="next" href="#caricaturamain"  class="right sociales-carousel-control">&gt;</a>';
        $caricatura .= '</div>';


        $caricatura .= '<script type="text/javascript">jQuery(document).ready(function($) {';
        $caricatura .= "$('[data-toggle=\"modal\"]').click(function(e) {e.preventDefault();var imagen_sociales = $(this).data('img');var caption_sociales = $(this).data('caption');$('.modal-body #imagen_caricatura_modal').attr('src', imagen_sociales);$('.modal-footer').html('<p>'+ caption_sociales +'</p>');});";
        $caricatura .= '});</script>';
        $caricatura .= '<div id="carruselFarandula" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
        $caricatura .= '<div class="modal-header">';
        $caricatura .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        $caricatura .= '<h3><i class="icon-eye-open icon-white"></i> </h3>';
        $caricatura .= '</div>';
        $caricatura .= '<div class="modal-body">';
        $caricatura .= '<img id="imagen_caricatura_modal" class="img_caricatura" src=""/>';
        $caricatura .= '</div>';
        $caricatura .= '<div class="modal-footer"></div>';
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

register_widget('Farandula_Widget');
