<?php
session_start();
include("../Database.php");
if(isset($_REQUEST['action'])){
	session_destroy();
	header("location:index.php");
}
if(!isset($_SESSION['name'])){

	die("Un authorized Access!");

}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	if($x->Insert("menus","name='$name',content='$content',status='$status'")){

		$msg="Menu Add Success!";

	}
	else{
		$msg="Menu Add Fail";
	}
}

if(isset($_REQUEST['update'])){

	extract($_REQUEST);


	if($x->Update("menus","name='$name',content='$content',status='$status'","menu_id=$edit_menu")){

		$msg="Menu Update Success";

	}
	else{
		$msg="Menu Update Fail!";
	}

}



?>

<html>
	<head>
		<title></title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	</head>
<body>
	<?php
		include("dashboard_menus.php");
	?>
<div class="main">
 
 <h2>Manage Menus</h2>
 <?=@$msg;?>
<?php
if(isset($_REQUEST['menu_id'])){
	$menu_id=$_REQUEST['menu_id'];
	extract($x->getById("menus","*","menu_id=$menu_id"));
	?>
	<h2>Edit Menu</h2>
	<?= @$msg;?>
	<form action="menus.php" method="post">
 		<table border="1" align="center" cellpadding="5">
 			<tr>
 				<th colspan="2">Add New Menu</th>
 				
 			</tr>
 			<tr>
 				<th>Menu Name</th>
 				<td><input type="text" value="<?php echo isset($name)?$name:'';?>" size="50" name="name"></td>
 			</tr>
 			<tr>
 				<th>Content</th>
 				<td>
 					<textarea name="content" id="content" rows="10" cols="50"><?php echo isset($content)?$content:'';?></textarea>
 						 <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
 				</td>
 			</tr>
 			<tr>
 				<th>status</th>
 				<td>
 						<select name="status">
 							<option value="0" <?php echo $status==0?'selected':''?>">Unpublish</option>
 							<option <?php echo $status==1?'selected':''?>  value="1">Publish</option>
 						</select>

 				</td>
 			</tr>
 		<tr>
 				
 				<td colspan="2" align="center">
 				<input type="hidden" name="edit_menu" value="<?php echo $menu_id;?>">
 					<input type="submit" name="update" value="Update" class="btn orange">
 				</td>
 			</tr>

 		</table>
 </form>
	<?php
}
else{
?>
 <form action="menus.php" method="post">
 		<table border="1" align="center" cellpadding="5">
 			<tr>
 				<th colspan="2">Add New Menu</th>
 				
 			</tr>
 			<tr>
 				<th>Menu Name</th>
 				<td><input type="text" size="50" name="name"></td>
 			</tr>
 			<tr>
 				<th>Content</th>
 				<td>
 					<textarea name="content" id="content" rows="10" cols="50"></textarea>
 						 <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
 				</td>
 			</tr>
 			<tr>
 				<th>status</th>
 				<td>
 						<select name="status">
 							<option value="0">Unpublish</option>
 							<option value="1">Publish</option>
 						</select>

 				</td>
 			</tr>
 		<tr>
 				
 				<td colspan="2" align="center">
 					<input type="submit" name="submit" value="Save" class="btn orange">
 				</td>
 			</tr>

 		</table>
 </form>
 <?php
}
?>
</div>
<div>

	<?php
		if(isset($_REQUEST['del_id'])){
			$del_id=$_REQUEST['del_id'];

			?>
			Do you want to Delete? <a href="menus.php?cdel_id=<?=$del_id?>">Yes</a>&nbsp; &nbsp; <a href="menus.php">No</a>
			<?php

		}

		if(isset($_REQUEST['cdel_id'])){
			$cdel_id=$_REQUEST['cdel_id'];

			if($x->Delete("menus","menu_id=$cdel_id")){
				echo "Delete Success";
			}
			else{
				echo "Delete Fail!";
			}

		}
	?>

</div>
<div>

		<table border="1" cellspacing="5" align="center" width="500">
				<tr>
						<th>Name</th>
						<th>Status</th>
						<th>Action</th>
				</tr>
				<?php
					$menus=$x->getAll("menus","*");
					foreach($menus as $menu){
						extract($menu);
				?>
				<tr>
						<td><?=$name;?></td>
						<td><?php echo $status==1?"Publish":"Unpublish";?></td>
						<td><a href="menus.php?menu_id=<?=$menu_id;?>">Edit</a>&nbsp;&nbsp;<a href="menus.php?del_id=<?=$menu_id;?>">Delete</a></td>
				</tr>
				<?php
			}
			?>

		</table>
</div>
</body>
</html>