<!-- Multimedia, Farandula -->
<div class='container margen-container'>
    <div id='multimedia' class='row-fluid'>
        <div class="span8 seccion-left">
            <h2>Multimedia</h2>
            <?php if ( dynamic_sidebar('multimedia') ) : else : endif; ?>
        </div>
        <div class="span4">
            <?php get_template_part( 'blocks/publicidadmultimedia' ); ?>
        </div>
    </div>

</div>
<!-- Fin Mukltimedia, Farandula -->