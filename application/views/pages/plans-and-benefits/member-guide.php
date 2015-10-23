<div class="member-guide">

	<div class="breadcrumbs-container">
		<?= $this->breadcrumbs->show(); ?>
	</div>

	<div class="cover">
		<div class="cover-title bg-purple">
			<div class="container">
				<h1><?= $title ?></h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<p>Welcome to a guide for your journey through the Medical Tourist Industry. We are delighted you have chosen I’m a Medical Tourist and we are certain you are going to enjoy your time with us.</p>

				<p>This guide will teach you more about how your card works and how to make the most out of it.</p>

				<p>First of all, make sure the details in your card are correct: confirm the card name is the membership plan you ordered and ID number legible on the card, in order to validate it for use. Every card comes with in full color depending on the type of membership plan you have chosen. An informative guide is included.</p>

				<p>The guide describes the best way to use your card, the benefits of your membership card and the participant businesses where you can enjoy the benefits. You will find useful information for the medical traveler before, during and after the trip, as well as a map with the location of the participant businesses.</p>
				
				<img src="/assets/img/welcoming-guide-sm.jpg" alt="" class="img-responsive hidden-md-up">
				<img src="/assets/img/welcoming-guide-lg.jpg" alt="" class="img-responsive hidden-sm-down">

			</div>

			<div class="col-md-4  col-md-offset-4 form-download">
				<h4 class="text-green text-center">Download your free I’m a Medical Tourist Guide</h4>
				<?php if(validation_errors()):?>
				<div class="alert alert-danger"><?= validation_errors() ?></div>
				<?php endif;?>
				<?php if(isset($msg_send)): ?>
					<div class="alert alert-success"><?= $msg_send; ?></div>
				<?php endif; ?>
				<?php if(isset($msg_send_error)): ?>
					<div class="alert alert-danger"><?= $msg_send_error; ?></div>
				<?php endif; ?>

				<?= form_open('plans-and-benefits/send-guide') ?>
					<fieldset class="form-group">
						<?= form_input('user_id', '', 'class="form-control" placeholder="ID Number" autofocus') ?>
					</fieldset>
					<fieldset class="form-group">
						<?= form_input('email', '', 'class="form-control" placeholder="Email Address"') ?>
					</fieldset>
					 <?= form_submit('submit', 'Submit', 'class="btn btn-green"') ?>
				<?= form_close() ?>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<small class="text-muted">Note: We will send you an email with links so you can download a PDF of this guidebook. Your data will not be shared with any third parties and all details are kept secure.</small>
				
			</div>

			
		</div>
	</div>

</div>
