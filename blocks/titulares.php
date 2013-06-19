<div id='content' class='row-fluid'>
        <div class='span8 main'>

            <?php

                function filter_where($where = '') {
                    $where .= " AND post_date >= '" . date('Y-m-d') . "'";
                    return $where;
                }
                add_filter('posts_where', 'filter_where');

                $args = array(
                    'category_name' => 'Portada,Principal',
                    'post_status' => 'publish',
                    'posts_per_page' => 1
                );

                $principal = query_posts($args);
                remove_filter('posts_where', 'filter_where');


            ?>

            <?php while (have_posts()) : the_post(); ?>

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php

                    $args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'post_status' => null,
                        'post_parent' => $post->ID,
                        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
                        'caption' => $attachment->post_excerpt,
                        'title' => $attachment->post_title
                    );

                    $attachments = get_posts( $args );

                    if ( $attachments ) {
                        $imagen =  wp_get_attachment_image_src( $attachments[0]->ID, array(730,344) );
                        $attachment_meta = wp_get_attachment($attachments[0]->ID);
                    }
                    else
                    {
                        $imagen =  '';
                    }

                ?>

                <img src="<?php echo $imagen[0];?>" width="730" height="344" alt="<?php echo $attachment_meta['alt'];?>" title="<?php echo $attachment_meta['title'];?>">

                <p><?php echo substr(get_the_content(), 0,450)."[...]"; ?></p>
            <?php endwhile; ?>
            <?php wp_reset_query();?>
            <!-- Noticia princpal -->

            <!-- Fin Noticia princpal -->
            <div class='row-fluid'>
                <div class="span6 noticia-secundaria">

                    <ul class="thumbnails">
                        <li class="span12 nomargen-abajo">
                            <div class="thumbnail thumbnail-custom">
                                <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a></h3>
                                <img class="img-cultura" data-src="holder.js/356x154">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>
                        <li class="span12 nomargen-abajo">
                            <div class="thumbnail thumbnail-custom">
                                <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a></h3>
                                <img class="img-cultura" data-src="holder.js/356x154">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>

                        <li class="span12 nomargen-abajo">
                            <div class="thumbnail thumbnail-custom">
                                <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a></h3>
                                <img class="img-cultura" data-src="holder.js/356x154">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>
                    </ul>



                </div>
                <div class="span6 noticia-secundaria">

                    <ul class="thumbnails">
                        <li class="span12 nomargen-abajo">
                            <div class="thumbnail thumbnail-custom">
                                <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a></h3>
                                <img class="img-cultura" data-src="holder.js/356x154">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>
                        <li class="span12 nomargen-abajo">
                            <div class="thumbnail thumbnail-custom">
                                <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a></h3>
                                <img class="img-cultura" data-src="holder.js/356x154">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>

                        <li class="span12 nomargen-abajo">
                            <div class="thumbnail thumbnail-custom">
                                <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut. </a></h3>
                                <img class="img-cultura" data-src="holder.js/356x154">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class='span4 sidebar'>
            <h2>Sidebar</h2>
            <ul class="nav nav-tabs nav-stacked">
                <li><a href='#'>Another Link 1</a></li>
                <li><a href='#'>Another Link 2</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
                <li><a href='#'>Another Link 3</a></li>
            </ul>

            <ul class="thumbnails">
                <li class="span12">
                    <div class="thumbnail publicidad">
                        <img data-src="holder.js/350x350">
                    </div>
                </li>
            </ul>


            <ul class="thumbnails">
                <li class="span12">
                    <div class="thumbnail portada">
                        <h3>Portada</h3>
                        <img data-src="holder.js/350x390" alt="">
                    </div>
                </li>
            </ul>

        </div>
    </div>