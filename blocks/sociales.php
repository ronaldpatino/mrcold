<!-- Sociales -->
<div class='container margen-container'>
    <div id='sociales' class='row-fluid'>
        <div class="span8 seccion-left">
            <h2>Sociales</h2>
            <?php if ( dynamic_sidebar('sociales') ) : else : endif; ?>
        </div>
        <div class="span4">
            <?php get_template_part( 'blocks/publicidadsociales' ); ?>
        </div>
    </div>
</div>
<!-- Fin Sociales -->