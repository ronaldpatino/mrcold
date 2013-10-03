<?php
/*
Template Name: Pagina Interior
*/
get_header(); ?>


<!-- Cabecera, titulares -->
<div class='container'>

    <?php get_template_part('blocks/menutop'); ?>
    <?php get_template_part('blocks/logo'); ?>
    <?php get_template_part('blocks/navbartop'); ?>
</div>

<?php get_template_part('blocks/publicidadcabecera'); ?>

<!-- Fin cabecera, titulares -->

<div class='container'>
    <?php get_template_part('blocks/masleido'); ?>

    <div id='content' class='row-fluid'>
        <div class='span8 main'>

            <?php
            $categoria = get_category_by_slug('cultura');
            print_r($categoria);
            $args = array(
            'category_name' => 'portada',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'cat'   => $categoria->term_id
            );

            //add_filter('posts_where', 'filter_where');
            query_posts($args);

            ?>


            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();?>
                    <?php the_title(); ?>
                    <hr/>

                <?php endwhile;?>
            <?php endif;?>
        </div>
        <div class='span4 sidebar'>

            <?php if ( dynamic_sidebar('detallenoticia') ) : else : endif; ?>

        </div>
    </div>

</div>

<?php get_template_part('blocks/pie'); ?>
<?php get_template_part('blocks/twitter'); ?>

<?php get_footer(); ?>
