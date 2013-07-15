<!-- Opinion-->
<div class='container margen-container'>
    <div class="row-fluid" id='opinion'>
        <div class="span4">
            <?php if ( dynamic_sidebar('caricatura') ) : else : endif; ?>

            <div id="caricaturamain" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item">
                        <ul class="thumbnails sociales-thumbnails">
                            <li class="span12">
                                <img alt="" class="caricatura" src="<?php bloginfo('template_url'); ?>/assets/img/1.jpg">
                                <div class="carousel-caption">
                                    <p>Fecha.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="thumbnails sociales-thumbnails">
                            <li class="span12">
                                <img alt="" class="caricatura" src="<?php bloginfo('template_url'); ?>/assets/img/2.png">
                                <div class="carousel-caption">

                                    <p>Fecha.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Carousel nav -->
                <a class="left caricatura-carousel-control" href="#caricaturamain" data-slide="prev">&lsaquo;</a>
                <a class="right caricatura-carousel-control" href="#caricaturamain" data-slide="next">&rsaquo;</a>
            </div>



        </div>

        <div class="span4">
            <h2>Opini&oacute;n</h2>

            <h3>
                <a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</a>
            </h3>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>



        </div>

        <div class="span4">
            <h2>Temas</h2>
        </div>
    </div>
</div>
<!-- Fin Opinion-->