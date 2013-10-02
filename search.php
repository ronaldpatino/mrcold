<?php
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

            <?php if ( have_posts() ) : ?>
            <article role="main" class="page-content search-content">
                <h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php echo get_permalink( get_the_ID()); ?>"><?php the_title(); ?></a>
                    <hr>
                <?php endwhile; ?>


                <?php else : ?>
                    <h1 class="entry-title"><?php _e( 'Nothing Found' ); ?></h1>
                    <article class="entry-content">
                        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
                        <?php ?>
                    </article><!-- .entry-content -->
                <?php endif; ?>
            </article>

        </div>
        <div class='span4 sidebar'>

            <?php if ( dynamic_sidebar('detallenoticia') ) : else : endif; ?>

        </div>
    </div>

</div>

<?php get_template_part('blocks/pie'); ?>
<?php get_template_part('blocks/twitter'); ?>

<?php get_footer(); ?>
