<?php ?>
<!DOCTYPE html>
<head>
    <title>
        <?php
            global $page, $paged;
            wp_title('|', true, 'right');
            bloginfo('name');
            $site_description = get_bloginfo('description', 'display');

            if ($site_description && (is_home() || is_front_page())) {
                echo " | $site_description";
            }

            if ($paged >= 2 || $page >= 2) {
                echo ' | ' . sprintf(__('Page %s'), max($paged, $page));
            }
        ?>
    </title>
    <meta name="description"
    content="<?php if (is_single())
                    {
                        single_post_title('', true);
                    } else {
                        bloginfo('name');
                        echo " - ";
                        bloginfo('description');
                    }
                    ?>"/>

    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>


    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.png">
    <link rel="author" type="text/plain" href="<?php echo bloginfo('template_directory'); ?>/humans.txt"/>



    <?php wp_head(); ?>
</head>

<body>
<header role="banner">
    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
       rel="home" class="logo"><?php bloginfo('name'); ?></a>

    <p class="desc">
        <?php bloginfo('description'); ?>
    </p>
    <nav role="navigation">
        <?php $args = array('menu' => 'mainnav', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
    </nav>
    <?php get_search_form(); ?>
</header>