<div class="login">

    <?php
    $args = array(
            'echo'           => true,
            'redirect'       => BLOGURL.'/prive',
            'form_id'        => 'loginform',
            'label_username' => __( 'Email' , TRANSDOMAIN),
            'label_password' => __( 'Contraseña' , TRANSDOMAIN),
            'label_remember' => __( 'Recordar' , TRANSDOMAIN),
            'label_log_in'   => __( 'LOGIN' , TRANSDOMAIN),
            'id_username'    => 'user_login',
            'id_password'    => 'user_pass',
            'id_remember'    => 'rememberme',
            'id_submit'      => 'wp-submit',
            'remember'       => false,
            'value_username' => NULL,
            'value_remember' => false
    );
    wp_login_form( $args );

    ?>
    <div class="">
        <a class="suscribirse" href="<?php echo BLOGURL; ?>/register" >Suscribirse</a>
    </div>

    <div class="recuperar">
        <a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" ><?php echo __('¿Olvidaste tu contraseña?', TRANSDOMAIN)?></a>
    </div>


    <?php echo wpautop( $post->post_content ) ;  ?>

</div>
