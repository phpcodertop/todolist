<h1>Register</h1>
<p>Please fill in this form to have an account</p>

<?php if(isset($userisin)) echo '<p class="alert alert-danger">'.$userisin.'</p>'; ?>
<?php echo validation_errors('<p class="alert alert-danger">'); ?>
<?php echo form_open('users/register');?>

<p class="" >
	<?php echo form_label('First Name : '); ?>
	<?php $data = array(
			'name' => 'first_name',
			'placeholder' => 'enter First Name',
			'class' => 'form-control',
			'style' => 'width: 200px',
			'value' => set_value('first_name')
		); ?>
	<?php echo form_input($data); ?>
</p>

<p>
	<?php echo form_label('Last Name : '); ?>
	<?php $data = array(
			'name' => 'last_name',
			'placeholder' => 'enter Last Name',
			'class' => 'form-control',
			'style' => 'width: 200px',
			'value' => set_value('last_name')
		); ?>
	<?php echo form_input($data); ?>
</p>

<p>
	<?php echo form_label('Email : '); ?>
	<?php $data = array(
			'name' => 'email',
			'placeholder' => 'enter valid email',
			'class' => 'form-control',
			'style' => 'width: 200px',
			'value' => set_value('email')
		); ?>
	<?php echo form_input($data); ?>
</p>

<p>
	<?php echo form_label('username : '); ?>
	<?php $data = array(
			'name' => 'username',
			'placeholder' => 'enter User Name',
			'class' => 'form-control',
			'style' => 'width: 200px',
			'value' => set_value('username')
		); ?>
	<?php echo form_input($data); ?>
</p>

<p>
	<?php echo form_label('Password : '); ?>
	<?php $data = array(
			'name' => 'password',
			'placeholder' => 'enter Password',
			'class' => 'form-control',
			'style' => 'width: 200px',
			'value' => set_value('password')
		); ?>
	<?php echo form_password($data); ?>
</p>

<p>
	<?php echo form_label('Repeat password : '); ?>
	<?php $data = array(
			'name' => 'password2',
			'placeholder' => 'Repeat Password',
			'class' => 'form-control',
			'style' => 'width: 200px',
			'value' => set_value('password2')
		); ?>
	<?php echo form_password($data); ?>
</p>

<p>
	<?php $data = array(
			'name' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Register'
		); ?>
	<?php echo form_submit($data); ?>
</p>

<?php echo form_close();?>