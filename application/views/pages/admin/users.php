<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	
	<style>
		#wrap{
			max-width: 60rem;
			margin: 30px auto;
		}
		header{
			border-bottom: 1px solid #ddd;
		}
		.login{
			float: right;
			list-style: none;
			margin-top: 18px;
		}
		.login li{
			display: inline-block;
		}
		.admin-users footer{
			padding: 0;
			position: absolute;
    	width: 100%;
    	bottom: 0;
		}
		.admin-users .copyright{
			margin-top: 18px;
		}
	</style>
	<!-- CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="admin-users">
<!-- HEADER -->
  <header>
    <div class="navbar">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="/assets/img/logo.svg" alt="">
        </a>
        <ul class="login">			
					<?php if ($this->session->userdata('is_logged_in')): ?>
						<li>You are logged in as <b><?= ($this->session->userdata('email')); ?></b></li>
						<li> | </li>
						<li><a href="/admin/logout">Logout</a></li>
					<?php endif; ?>
				</ul>
      </div>
    </div>
  </header>
<!-- /HEADER -->
	<div id="wrap">
		<?php echo $output; ?>
	</div>
		<footer>
			<div class="container">
				<p class="copyright">
	        Copyright &copy; <?= date('Y'); ?>
	      </p>
				</div>
		</footer>
</body>
</html>
