<?php if($this->session->userdata('logged_in')) :?>
	<p>You are logged in as <h3><?php echo $this->session->userdata('username'); ?></h3></p>
	<!--form logout-->
	<?php 
		$attributes = array(
				'class' => 'form-horizontal'
			);
		echo form_open('users/logout',$attributes);
	?>
	<?php
		//logout button
		$data = array(
				'name'  => 'submit',
				'value' => 'Logout',
				'class' => 'btn btn-primary'
			);
		echo form_submit($data);
	?>
	<?php echo form_close(); ?>
<?php else : //not logged in?>
<h3>Login Form</h3>
<?php $attributes = array(
						'id' => 'login_form',
						'class' => 'form-horizontal'
						 ); 
?>
<?php echo form_open('users/login',$attributes);?>

<p>
	<?php echo form_label('Username : '); ?>
	<?php $data = array(
			'name' => 'username',
			'placeholder' => 'enter username',
			'style' => 'width: 90%',
			'class' => 'form-control',
			'value' => set_value('username')
		); ?>
	<?php echo form_input($data); ?>
</p>

<p>
	<?php echo form_label('Password : '); ?>
	<?php $data = array(
			'name' => 'password',
			'placeholder' => 'enter password',
			'style' => 'width: 90%',
			'class' => 'form-control',
			'value' => set_value('password')
		); ?>
	<?php echo form_password($data); ?>
</p>

<p>
	<?php $data = array(
			'name' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Login'
		); ?>
	<?php echo form_submit($data); ?>
</p>

<?php echo form_close(); ?>

<?php endif; ?>	
