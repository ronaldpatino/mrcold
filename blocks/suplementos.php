<!-- Suplementos -->
<div class='container margen-container'>
    <div id='suplementos' class='row-fluid'>
        <div class="span4">
            <?php get_template_part( 'blocks/publicidadsuplementos' ); ?>
        </div>
        <div class="span8">
            <h2>
                Suplementos
            </h2>
            <!-- Carrusel suplementos -->



            <?php if ( dynamic_sidebar('suplementos') ) : else : endif; ?>
            <!-- Fin Carrusel suplementos -->
        </div>
    </div>

</div>
<!-- Fin Suplementos -->