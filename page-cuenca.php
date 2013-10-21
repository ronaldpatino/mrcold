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
            //$categoria = get_category_by_slug('cuenca');
            $args = array(
            'category_name' => 'cuenca',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'cat'=>-1
            );

            //add_filter('posts_where', 'filter_where');
            query_posts($args);

            ?>

            <ul class="media-list">
            <?php

            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    $imagen = get_featured_image(get_the_ID());
                    ;?>


                        <li class="media ml2p">
                            <a class="pull-left" href="<?php the_permalink();?>">
                                <img class="media-object" src="<?php echo $imagen['imagen'][0]?>" alt="<?php echo  get_the_title(); ?>" title="<?php echo  get_the_title(); ?>">
                            </a>
                            <div class="media-body">
                                <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                <p>Publicado el <?php the_time('Y/m/d') ?> por  <?php echo get_the_author(); ?></p>
                            </div>
                        </li>


                <?php endwhile;?>
            </ul>
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
