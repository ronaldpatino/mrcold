<?php



class Seccion_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'cultura_widget', // Base ID
            'Seccion Widget', // Name
            array( 'description' => __( 'Seccion que vamos a mostrar en el sidebar', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        extract( $args );

        print_r($instance);
        ?>
        <div class="span4 noticia-tricol">
            <h2 class="cultura"><?php echo $instance['categoria'];?></h2>
            <!-- -->

            <ul class="thumbnails">
                <li class="span12">
                    <div class="thumbnail thumbnail-custom">
                        <h3><a href="#">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</a></h3>
                        <img data-src="holder.js/300x200" alt="">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </li>
            </ul>

            <!-- -->
            <div class="media ml2p">
                <a class="pull-left" href="#">
                    <img class="media-object" data-src="holder.js/120x74">
                </a>

                <div class="media-body media-body-tricol">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua
                </div>
            </div>
            <br/>

        </div>

        <?php
    }

    public function form( $instance )
    {
        $selected =  ($instance['categoria'] != -1)?$instance['categoria']:-1;

        $form  = '<p>';
        $form .= '<label for="' . $this->get_field_id( 'categoria' ) . '">'  . _e( 'Seccion:' ) . '</label>';
        $form .= wp_dropdown_categories(array('selected'=> $selected, 'show_option_none' => __('Ninguna'), 'hide_empty' => 0, 'id' => $this->get_field_id( 'categoria' ) ,'name' => $this->get_field_name( 'categoria' ), 'orderby' => 'name', 'hierarchical' => true, 'echo'=>0));
        $form .= '</p>';
        echo $form;
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['categoria'] = strip_tags( $new_instance['categoria'] );
        return $instance;
    }
}

register_widget('Seccion_Widget');

?>