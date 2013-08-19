<?php get_header(); ?>

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
            <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                <!-- detalle de la noticia -->
                <article role="main" class="primary-content" id="post-<?php the_ID(); ?>">
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <p>Publicado el <?php the_time('Y/m/d') ?> por  <?php echo get_the_author();?>
                    </header>

                    <?php the_post_thumbnail('full');?>

                    <?php the_content(); ?>



                     <hr/>
                     <?php comments_template('',true); ?>

                <!-- fin detalle de la noticia -->

            <?php endwhile; // end of the loop. ?>
            </article>
        </div>
        <div class='span4 sidebar'>

            HOLA

        </div>
    </div>

</div>

<?php wpb_set_post_views(get_the_ID());?>

<?php get_template_part('blocks/pie'); ?>
<?php get_template_part('blocks/twitter'); ?>

<?php get_footer(); ?>
