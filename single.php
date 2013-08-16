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
                        <p>Posted <strong><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></strong> on <time datetime="<?php the_time('l, F jS, Y') ?>" pubdate><?php the_time('l, F jS, Y') ?></time> &middot; <a href="<?php the_permalink(); ?>">Permalink</a></p>
                    </header>

                    <?php the_post_thumbnail('full');?>

                    <?php the_content(); ?>


                        <p>Posted <strong><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></strong> on <time datetime="<?php the_time('l, F jS, Y') ?>" pubdate><?php the_time('l, F jS, Y') ?></time> &middot; <a href="<?php the_permalink(); ?>">Permalink</a></p>
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
