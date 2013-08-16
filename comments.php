<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ){
    return;
}


    if ( have_comments() ) :
         wp_list_comments(array(
                                'style'             => 'div',
                                'callback'          => 'mrc_comments',
                                'reply_text'        => 'Respoder',
                                'avatar_size'       => 32,
                                ));
    endif;

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required_text = "";

    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'title_reply'       => __( 'Deje un comentario' ),
        'title_reply_to'    => __( 'Deje un comentario a %s' ),
        'cancel_reply_link' => __( 'Cancelar Respuesta' ),
        'label_submit'      => __( 'Enviar Comentario' ),

        'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comentario', 'noun' ) .
        '</label><textarea id="comment" name="comment" cols="50" rows="8" aria-required="true">' .
        '</textarea></p>',

        'must_log_in' => '<p class="must-log-in">' .
        sprintf(
            __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __( 'Bienvenido <a href="%1$s">%2$s</a> deje su comentario. <a href="%3$s" title="Log out of this account">Salir?</a>' ),
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes">' .
        __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
        '</p>',

        'comment_notes_after' => '<p class="form-allowed-tags">' .
        sprintf(
            __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
            ' <code>' . allowed_tags() . '</code>'
        ) . '</p>',

        'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                '<p class="comment-form-author">' .
                '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',

                'email' =>
                '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>',

                'url' =>
                '<p class="comment-form-url"><label for="url">' .
                __( 'Website', 'domainreference' ) . '</label>' .
                '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" size="30" /></p>'
            )
        ),
    );

    comment_form($args);