<?php get_header(); ?>


<!-- Cabecera, titulares -->
<div class='container'>

    <?php get_template_part('blocks/menutop'); ?>
    <?php get_template_part('blocks/logo'); ?>
    <?php get_template_part('blocks/navbartop'); ?>
</div>

<?php get_template_part('blocks/publicidadcabecera'); ?>

<!-- Fin cabecera, titulares -->

<div class='container'>
    <?php get_template_part('blocks/masleido'); ?>

    <div id='content' class='row-fluid'>
        <div class='span8 main'>
                <div id="register-form">
                    <div class="title">
                        <h1>Register your Account</h1>
                        <span>Sign Up with us and Enjoy!</span>
                    </div>
                    <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">

                        <input type="text" name="user_login" value="" id="user_login" class="input" size="20" />
                        <input type="text" name="user_email" id="user_email" class="input" value=""  />
                        <?php do_action('register_form'); ?>
                        <input type="submit" value="Register" id="register" />
                        <hr />
                        <p class="statement">A password will be e-mailed to you.</p>

                    </form>
                </div>



        </div>
        <div class='span4 sidebar'>

            <?php if ( dynamic_sidebar('detallenoticia') ) : else : endif; ?>

        </div>
    </div>

</div>

<?php wpb_set_post_views(get_the_ID());?>

<?php get_template_part('blocks/pie'); ?>
<?php get_template_part('blocks/twitter'); ?>

<?php get_footer(); ?>
