<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/custom.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/font.css" rel="stylesheet">

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery-1.9.0.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/bootstrap.js"></script>

</head>
<body>

<!-- Cabecera, titulares -->
<div class='container'>

    <?php get_template_part( 'blocks/menutop' ); ?>
    <?php get_template_part( 'blocks/logo' ); ?>
    <?php get_template_part( 'blocks/navbartop' ); ?>
</div>

<?php get_template_part( 'blocks/publicidadcabecera' ); ?>

<div class='container'>
    <?php get_template_part( 'blocks/masleido' ); ?>
    <?php get_template_part( 'blocks/titulares' ); ?>
</div>
<!-- Fin cabecera, titulares -->

<?php get_template_part( 'blocks/publicidadtitulares' ); ?>

<?php get_template_part( 'blocks/culturacuencasucesos' ); ?>

<?php get_template_part( 'blocks/sociales' ); ?>

<?php get_template_part( 'blocks/azuaycanarloja' ); ?>



<?php get_template_part( 'blocks/deportes' ); ?>

<?php get_template_part( 'blocks/deportivocuenca' ); ?>

<?php get_template_part( 'blocks/opinion' ); ?>

<?php get_template_part( 'blocks/multimedia' ); ?>

<?php get_template_part( 'blocks/suplementos' ); ?>

<?php get_template_part( 'blocks/pie' ); ?>

<?php get_template_part( 'blocks/twitter' ); ?>

 <?php wp_footer(); ?>
 <?php get_footer(); ?>
</body>
</html>