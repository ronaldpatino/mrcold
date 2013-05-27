<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <?php wp_head(); ?>
</head>
<body>

<body>
<div class="container">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <div class="pull-left">
                    Some interesting content
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="pull-right" type="search">
                    </div>
                </div>
                <img class="pull-left" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
                <img class="pull-right" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
                <img class="pull-right" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
                <img class="pull-right" src="https://s3.amazonaws.com/jetstrap-site/images/what_icon.png" width="20">
            </div>
        </div>
    </div>
</div>


<div id="main" class="container">
    <div class="row">
        <div class="span8">
            <h3>
                Span 4
            </h3>
            <p>
                Content
            </p>
        </div>
        <div  class="span4">
            <h3>
                Span 4
            </h3>
            <p>
                Content
            </p>
        </div>
    </div>
</div>

<div class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">Project name</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>