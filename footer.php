
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery-1.9.0.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/bootstrap.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/holder.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        /*Clima*/
        $.get("<?php bloginfo('template_url'); ?>/clima.php", function(data) { })
        .done(function(data) { $("#clima").append(data); })
        .fail(function() { $("#clima").append(""); });
        /*Fin clima*/

        /*Twitter*/
        $.getJSON('<?php bloginfo('template_url'); ?>/twitter.php', function(data) { })
        .done(function(data) {  var items = [];
                                $.each(data, function(key, val) {items.push('<li id="' + key + '">' + val.text + '</li>');});
                                $('<ul/>', {'id':'ticker','class': 'twitem', html: items.join('')}).appendTo('#twitterlist');
                                function tick(){
                                    $('#ticker li:first').slideUp( function () { $(this).appendTo($('#ticker')).slideDown(); });
                                }
                                setInterval(function(){ tick () }, 10000);
        })
        .fail(function() { });
        /*Fin Twitter*/


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
