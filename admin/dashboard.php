<?php
session_start();
if(isset($_REQUEST['action'])){
	session_destroy();
	header("location:index.php");
}
if(!isset($_SESSION['name'])){

	die("Un authorized Access!");

}
//echo "You're Logged in as ".$_SESSION['name'];
?>
<!-- &nbsp;&nbsp;<a href="dashboard.php?action=logout">Logout</a> -->
<html>
	<head>
		<title></title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
<body>
	<?php
    include("dashboard_menus.php");
  ?>

<div class="main">
 		<h2>Dashboard</h2>
</div>
</body>
</html>