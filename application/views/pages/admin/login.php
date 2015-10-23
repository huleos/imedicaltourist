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

				<?= form_open('/admin/login_validation') ?>
				  <h2>Please Login</h2>
				  <?= form_input('email', '', 'class="form-control" placeholder="Email address" required autofocus') ?>
				  <?= form_password('password', '', 'class="form-control" placeholder="Password" required') ?>
				  <?= form_submit('login_submit', 'Login', 'class="btn btn-lg btn-primary btn-block"') ?>
				<?= form_close() ?>

			</div>
		</div>
</div>
<br>
<div class="col-md-4 col-md-offset-4">
	<hr>
</div>