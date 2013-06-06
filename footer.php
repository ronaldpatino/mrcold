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
