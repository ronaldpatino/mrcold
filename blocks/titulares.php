<div id='content' class='row-fluid'>
        <div class='span8 main'>
            <?php if ( dynamic_sidebar('portada_titulares') ) : else : endif; ?>
        </div>
        <div class='span4 sidebar'>

            <?php if ( dynamic_sidebar('ultimas_masleidas_portada') ) : else : endif; ?>

            <ul class="thumbnails">
                <li class="span12">
                    <div class="thumbnail publicidad">
                        <img data-src="holder.js/350x350">
                    </div>
                </li>
            </ul>

        </div>
    </div>