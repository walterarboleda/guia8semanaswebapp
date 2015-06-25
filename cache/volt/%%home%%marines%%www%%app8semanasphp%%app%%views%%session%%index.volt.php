
<?php echo $this->getContent(); ?>

<div class="container form-signin form-container-login">
	<h2 style='text-align: center'>Panel de Administración</h2>
	<?php echo $this->tag->form(array('session/start', 'role' => 'form')); ?>
	<?php echo $this->tag->textField(array('username', 'class' => 'form-control', 'placeholder' => 'Usuario o Email')); ?>
	<?php echo $this->tag->passwordField(array('password', 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
	<?php echo $this->tag->submitButton(array('Enviar', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
	</form>

</div>