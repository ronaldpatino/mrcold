<!-- Deportivo Cuenca -->
<div class='container margen-container'>
    <div id='deportivocuenca' class='row-fluid'>
        <h2>Deportivo Cuenca</h2>
        <div class="row-fluid">
            <?php if ( dynamic_sidebar('deportivocuenca') ) : else : endif; ?>
            <?php get_template_part( 'blocks/publicidaddeportivocuenca' ); ?>
        </div>



    </div>
</div>
<!-- Fin Deportivo Cuenca -->