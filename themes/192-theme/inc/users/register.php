<?php

function cltvo_192_create_user() {
	$errors =  array();
	$username = isset($_POST['email']) ? trim($_POST['email']) : null;
	$email = isset($_POST['email']) ? trim($_POST['email']) : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$pass_confirmation = isset($_POST['pass_confirmation']) ? $_POST['pass_confirmation'] : null;

	if (preg_match_all( '/[\s]/', $password)) {
		$errors[] = __('La contraseña ingresada no puede contener espacios.', TRANSDOMAIN);
	}


	if ( mb_strlen($password) < 8 ) {
		$errors[] = __('La contraseña ingresada debe tener 8 o más caracteres alfanuméricos.', TRANSDOMAIN);
	}

	if (!$password === $pass_confirmation) {
		$errors[] = __('El password ingresado y su confirmación no coinciden.', TRANSDOMAIN);
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] =  __('El correo electrónico ingresado no es válido.', TRANSDOMAIN);
	}

	if (!empty($errors)) {
		return $_POST['errors'] = $errors;
	}

	$user_id =  wp_create_user( $username, $password, $email );

	if (is_object($user_id) && is_a($user_id, 'WP_Error')) {
	 	$errors[] = reset($user_id->errors)[0];
	}

	if (!empty($errors)) {
		return $_POST['errors'] = $errors;
	}

	$user = new WP_User($user_id);
	$user->set_role('subscriber');

	$_POST['success'] = __('¡Gracias por inscribirte!', TRANSDOMAIN);

	return $user_id;
}

?>
<div class="register">
	<form id="loginform" action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
	    <p>
		    <input placeholder="Email" type="text" name="email" value="<?php echo isset( $_POST['email']) ? $_POST['email'] : null ?>">
	    </p>
	    <p>
		    <input  placeholder="Contraseña" type="password" name="password" value="">
	    </p>

	    <p>
		    <input placeholder="Confirma Contraseña" type="password" name="pass_confirmation" value="">
		    </p>

	    	<input type="submit" name="submit" value="<?php echo __('Regristrame', TRANSDOMAIN)?>"/>
	</form>



	<?php
		if (!empty($_POST)) {
			cltvo_192_create_user();
		 }
	?>

	<div class="mensajes">
	<?php if (!empty($_POST['errors'])): ?>
		<?php foreach ($_POST['errors'] as $error): ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	<?php endif ?>

	<?php if (!empty($_POST['success'])): ?>
			<p><?php echo $_POST['success'] ?>¡Gracias por inscribirte!</p>
		    <a class="suscribirse" href="<?php echo BLOGURL; ?>/login" >Ingresar</a>
	<?php endif ?>
	</div>
</div>


