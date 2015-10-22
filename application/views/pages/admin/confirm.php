<div class="col-md-4 col-md-offset-4">
	<hr>
</div>
<br>
<br>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<?php if(isset($msg_confirm)): ?>
				<h2>Sign Up Confirmed</h2>
				<p>Thank you for signing!</p>
				<p><a href="<?= base_url().'admin/login' ?>">Login</a></p>
			<?php endif; ?>
			<?php if(isset($msg_confirm_error)): ?>
				<div class="alert alert-danger"><?= $msg_confirm_error ?></div>
			<?php endif; ?>
			<?php if(isset($msg_confirm_error_key)): ?>
				<div class="alert alert-danger"><?= $msg_confirm_error_key ?></div>
			<?php endif; ?>
			</div>
		</div>
</div>
<br>
<div class="col-md-4 col-md-offset-4">
	<hr>
</div>