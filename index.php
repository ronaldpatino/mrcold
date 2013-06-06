<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <?php wp_head(); ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/style.css" />
</head>
<body>

<body>

<div class="container-narrow">

    <?php get_template_part( 'blocks/navbartop' ); ?>

    <!-- Inicio Logo -->
    <div class="row-fluid">
        <div class="span12 logo">
            <img data-src="holder.js/534x90" >
        </div>
    </div>
    <!-- Fin Logo -->

    <?php get_template_part( 'blocks/menutop' ); ?>

    <?php get_template_part( 'blocks/masleido' ); ?>

    <?php get_template_part( 'blocks/titulares' ); ?>
</div>

<!-- publicidad -->
<div class="container-narrow-publicidad">
    <img data-src="holder.js/940x100/industrial">
</div>
<!-- Fin publicidad -->


<?php get_template_part( 'blocks/culturacuencasucesos' ); ?>

<?php get_template_part( 'blocks/sociales' ); ?>

<?php get_template_part( 'blocks/azuaycanarloja' ); ?>


<!-- publicidad -->
<div class="container-narrow-publicidad">
    <img data-src="holder.js/940x100/industrial">
</div>
<!-- Fin publicidad -->

<?php get_template_part( 'blocks/deportes' ); ?>

<?php get_template_part( 'blocks/deportivocuenca' ); ?>

<?php get_template_part( 'blocks/opinion'); ?>

<?php get_template_part( 'blocks/multimedia'); ?>

<?php get_template_part( 'blocks/suplementos'); ?>

<?php get_template_part( 'blocks/pie'); ?>


<?php get_template_part( 'blocks/twitter'); ?>


<?php wp_footer(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/holder.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $('[data-toggle="modal"]').click(function(e) {
            e.preventDefault();
            var imagen_sociales = $(this).data('img');
            var caption_sociales = $(this).data('caption');

            $(".modal-body #imagen_sociales").attr('src', imagen_sociales);
            $(".modal-footer").html('<p>'+ caption_sociales +'</p>');
        });

        $('[data-toggle="modal"]').click(function(e) {
            e.preventDefault();
            var imagen_multimedia = $(this).data('img');
            var caption_multimedia = $(this).data('caption');

            $(".modal-body #imagen_multimedia").attr('src', imagen_multimedia);
            $(".modal-footer").html('<p>'+ caption_multimedia +'</p>');
        });
    });
</script>


<?php get_template_part( 'blocks/modalsociales'); ?>
<?php get_template_part( 'blocks/modalmultimedia'); ?>

</body>
</html>