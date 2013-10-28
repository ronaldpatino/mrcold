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
            $src = getphpthumburl($imagen['imagen'][0], 'w=346&h=346&iar=1');
            $src_big = getphpthumburl($imagen['imagen'][0], 'w=400&h=400&iar=1');
            $caricatura .= "<li class='span12'>";
            $caricatura .= '<a href="#carruselCaricatura" data-caption=" ' . get_the_title() . '"  data-img=" ' . $src_big . '" data-toggle="modal">';
            $caricatura .= '<img class="img_caricatura" src="' . $src . '" alt="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay" title="' . get_the_title() . '  - El Mercurio de Cuenca Noticias Tiempo  Ecuador Azuay">';
            $caricatura .= "<div class='carousel-caption carousel-caption_imagenes_noticia' data-interval='10000'>";
            $caricatura .= '<p>' . get_the_title() . ' - ' . get_the_time('Y/m/d') .  '</p>';
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
        $caricatura .= '<div id="carruselCaricatura" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
        $caricatura .= '<div class="modal-header">';
        $caricatura .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        $caricatura .= '<h3><i class="icon-eye-open icon-white"></i> </h3>';
        $caricatura .= '</div>';
        $caricatura .= '<div class="modal-body">';
        $caricatura .= '<img id="imagen_caricatura_modal"  src=""/>';
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

register_widget('Caricatura_Widget');
