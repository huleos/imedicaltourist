

<div class="col-md-4 col-md-offset-4">
	<hr>
</div>
<br>
<br>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">

				<?php if(validation_errors()):?>
				<div class="alert alert-danger"><?= validation_errors() ?></div>
				<?php endif;?>
				<?php if(isset($msg_signup)): ?>
					<div class="alert alert-success"><?= $msg_signup; ?></div>
				<?php endif; ?>

				<?= form_open('admin/signup_validation') ?>
				  <h2>Sign Up</h2>
				  <?= form_input('first_name', '', 'class="form-control" placeholder="First name" required autofocus') ?>
				  <?= form_input('last_name', '', 'class="form-control" placeholder="Last name" required') ?>
				  <?= form_input('email', '', 'class="form-control" placeholder="Email address" required') ?>
				  <?= form_password('password', '', 'class="form-control" placeholder="Password" required') ?>
				  <?= form_password('cpassword', '', 'class="form-control" placeholder="Confirm Password" required') ?>
				  <?= form_submit('signup_submit', 'Sign up', 'class="btn btn-lg btn-primary btn-block"') ?>
				<?= form_close() ?>

			</div>
		</div>
</div>
<br>
<div class="col-md-4 col-md-offset-4">
	<hr>
</div>