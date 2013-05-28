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
                                <input  class="search-query" placeholder="Search" type="text" class="span2"><span class="add-on"><i class="icon-search"> </i></span>
                            </div>
                        </form>
                    </div>
                    <p class="pull-left p-top">Some interesting content</p>
                    <img class="pull-left img-top" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
                    <img class="pull-right img-top" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
                    <img class="pull-right img-top" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
                    <img class="pull-right img-top" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
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
        <li><a href="#">Home</a> <span class="divider">/</span></li>
        <li><a href="#">Library</a> <span class="divider">/</span></li>
        <li class="active">Data</li>
    </ul>
    <!-- Fin Mas leido -->




</div>
<?php wp_footer(); ?>
</body>
</html>