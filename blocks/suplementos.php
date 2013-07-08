<!-- Suplementos -->
<div class='container margen-container'>
    <div id='suplementos' class='row-fluid'>
        <div class="span4">
            <ul class="thumbnails publicidad-thumbnails">
                <li class="span12">
                    <div class="thumbnail publicidad">
                        <img data-src="holder.js/300x300">
                    </div>
                </li>
            </ul>
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