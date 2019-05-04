<?php
include('Database.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Content Management System</title>
		<!-- CSS-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/main.js"></script>
	</head>
<body>
	<div class="container" id="topContent" class="nav navbar-nav navbar-right">
		<a href="admin/index.php" >Sign in/sign up</a> 
	</div>
		<div >
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
							<?php include("header.php");?>
						</div>
					</div>
				</div>
		</div>
			<div id="banner-wrapper">
				<div class="container">
					<?php include("banner.php");?>
				</div>
			</div>
			<div id="main">
			<?php include("container.php");?>
			</div>
			<div id="footer-wrapper">
				<div class="container">
					<div class="row">
						<div class="8u 12u(mobile)">
						</div>
				<div class="4u 12u(mobile)">
							<section>
								<h2>Something of interest</h2>
								<p>Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed.
								Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet
								mollis justo facilisis quis. Sed sagittis mauris amet tellus gravida
								lorem ipsum dolor sit amet consequat blandit.</p>
								<footer class="controls">
									<a href="#" class="button">Oh, please continue ....</a>
								</footer>
							</section>
				</div>
					</div>
					<div class="row">
					</div>
				</div>
			</div>
		</div>
	</body>
</html>