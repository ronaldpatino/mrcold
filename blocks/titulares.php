<div id='content' class='row-fluid'>
        <div class='span8 main'>


            <!-- Noticia princpal -->
                <?php echo get_noticia_principal();?>
            <!-- Fin Noticia princpal -->
            <!-- Noticias de Portada-->
            <div class='row-fluid'>
                <?php echo get_noticias_portada();?>
           </div>
            <!-- fin Noticias de Portada-->

        </div>
        <div class='span4 sidebar'>
            <h2>&Uacute;ltimas Noticias</h2>
            <?php echo get_ultimas_noticias()?>

            <h2>M&aacute;s Le&iacute;das</h2>
            <?php echo get_mas_leidas()?>

            <ul class="thumbnails">
                <li class="span12">
                    <div class="thumbnail publicidad">
                        <img data-src="holder.js/350x350">
                    </div>
                </li>
            </ul>

            <?php echo get_portada_impresa();?>

        </div>
    </div>