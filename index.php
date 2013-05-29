<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <?php wp_head(); ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/style.css" />
    <script src="assets/js/holder.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/holder.js"></script>
</head>
<body>

<body>

<div class="container-narrow">
    <div class="navbar top-navbar">
        <div class="navbar-inner top-navbar-inner">
            <div class="control-group">
                <div class="controls">
                    <form class="navbar-search pull-right">
                        <div class="input-append">
                            <input  class="search-query" placeholder="Buscar en El Mercurio" type="text" class="span2"><span class="add-on"><i class="icon-search"> </i></span>
                        </div>
                    </form>
                </div>
                <p class="pull-left p-top"><?php echo get_fecha(); get_clima();?></p>
                <a href="#"><img title="El Mercurio Noticias Ecuador Facebook" alt="El Mercurio Noticias Ecuador Facebook" class="pull-right img-top" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png"></a>
                <a href="#"><img title="El Mercurio Noticias Ecuador Twitter"  alt="El Mercurio Noticias Ecuador Twitter" class="pull-right img-top" src="<?php bloginfo('template_url'); ?>/assets/img/twitter.png"></a>
                <a href="#"><img title="El Mercurio Noticias Ecuador YouTube" alt="El Mercurio Noticias Ecuador YouTube" class="pull-right img-top" src="<?php bloginfo('template_url'); ?>/assets/img/youtube.png"></a>
            </div>



        </div>
    </div>

    <!-- Inicio Logo -->
    <div class="row-fluid">
        <div class="span12 logo">
            <img data-src="holder.js/534x90" >
        </div>
    </div>
    <!-- Fin Logo -->

    <!-- Inicio Menu -->
    <div class="navbar">
        <div class="navbar-inner navbar-menu">
            <div class="container">
                <ul class="nav">

                    <li class="active"><a href="#"><i class="icon-home"></i></a></li>
                    <li><a href="#" class="cuenca">CUENCA</a></li>
                    <li><a href="#" class="deportes">DEPORTES</a></li>
                    <li><a href="#" class="sucesos">SUCESOS</a></li>
                    <li><a href="#" class="nacionales">NACIONALES</a></li>
                    <li><a href="#" class="austro">AUSTRO</a></li>
                    <li><a href="#" class="cultura">CULTURA</a></li>
                    <li><a href="#" class="farandula">FARANDULA</a></li>
                    <li><a href="#" class="mundo">MUNDO</a></li>
                    <li><a href="#" class="opinion">OPINION</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Fin menu -->

    <!-- Mas leido -->
    <ul class="breadcrumb">
        <li> Lo M&aacute;s Le&iacute;do </li>
        <li><a href="#">Library</a> <span class="divider">&nbsp;</span></li>
        <li><a href="#">Library</a> <span class="divider">&nbsp;</span></li>
        <li><a href="#">Library</a> <span class="divider">&nbsp;</span></li>
    </ul>
    <!-- Fin Mas leido -->

    <!-- Inicio Titulares -->
    <div class="row-fluid" >
        <div class="span8">
            <div class="noticia-principal">
                <h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                </h3>
                <img data-src="holder.js/600x324">

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <!-- Inicio Noticias Secundarias-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="noticia-secundaria">
                        <h3>
                            Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                        </h3>
                        <img class="cuenca" data-src="holder.js/294x154">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>


                    <div class="noticia-secundaria">
                        <h3>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </h3>
                        <img class="deportes" data-src="holder.js/294x154">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Fin Noticias Secundarias-->

            <!-- Inicio Noticias Secundarias-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="noticia-secundaria">
                        <h3>
                            Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                        </h3>
                        <img class="austro" data-src="holder.js/294x154">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>


                    <div class="noticia-secundaria">
                        <h3>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </h3>
                        <img class="nacionales" data-src="holder.js/294x154">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Fin Noticias Secundarias-->

            <!-- Inicio Noticias Secundarias-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="noticia-secundaria">
                        <h3>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </h3>
                        <img class="deportes" data-src="holder.js/294x154">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>


                    <div class="noticia-secundaria">
                        <h3>
                            Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                        </h3>
                        <img class="sucesos" data-src="holder.js/294x154">

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Fin Noticias Secundarias-->

        </div>
        <div class="span4 ultimas-noticias">
            <div class="row-fluid">
                <!-- Inicio Bloque de Noticias -->
                <div class="span12 widget-box">

                    <div class="widget-title">
                        <h5>Ultimas Noticia</h5>
                    </div>

                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a href="#" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->
                    <!-- Incio Noticia -->
                    <div class="widget-content nopadding updates">
                        <div class="new-update clearfix">
                            <div class="update-done">
                                <a title="" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a>
                            </div>
                            <div class="update-date"><span class="update-day">08:00</span></div>

                        </div>
                    </div>
                    <!-- Fin Noticia -->

                </div>
                <!-- Fin Bloque de Noticias -->

                <!-- Inicio Bloque de Publicidad -->
                <div class="row-fluid">
                    <div class="span12">
                        <img data-src="holder.js/295x295/industrial">
                    </div>
                </div>
                <!-- Fin Bloque de Publicidad -->

                <!-- Inicio Bloque de Portada -->
                <div class="row-fluid ">
                    <div class="span12 portada">
                        <img data-src="holder.js/290x355">
                    </div>
                </div>
                <!-- Fin Bloque de Portada -->

            </div>
        </div>
    </div>
    <!-- Fin titulares -->
</div>

<!-- publicidad -->
<div class="container-narrow-publicidad">
    <img data-src="holder.js/940x100/industrial">
</div>
<!-- Fin publicidad -->


<!-- Inicio tricol-->
<div class="container-narrow">
    <div class="row-fluid tricol">
        <div class="span4 noticia-tricol">
            <!-- Noticia Destacada seccion-->
            <div>
                <h2 class="cultura-tri">Cultura</h2>
                <img data-src="holder.js/297x154">
                <h3>
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                </h3>
            </div>

            <!-- Fin Noticia Destacada -->

            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->



        </div>
        <div class="span4 noticia-tricol">
            <div>
                <h2 class="cuenca-tri">Cuenca</h2>
                <img data-src="holder.js/297x154">
                <h3>
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                </h3>
            </div>

            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
        </div>

        <div class="span4 noticia-tricol">
            <div>
                <h2 class="sucesos-tri">Sucesos</h2>
                <img data-src="holder.js/297x154">
                <h3>
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                </h3>
            </div>

            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
            <!-- Noticia Secundaria  seccion-->
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" data-src="holder.js/110x64/industrial"></a>
                <div class="media-body media-font">
                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut sed do eiusmod tempor incididunt ut.
                </div>
            </div>
            <!-- Fin Noticia Secundaria seccion-->
        </div>
    </div>
</div>

<!-- Fin tricol-->

<?php wp_footer(); ?>


</body>
</html>