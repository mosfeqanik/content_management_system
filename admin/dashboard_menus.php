<nav>
  <ul class="clearfix">
    <li class="current">
      <a href="#">Dashboard</a>
    </li>
    <li>
      <a href="menus.php">Manage Menus</a>
      
    </li>
    <li>
      <a href="categories.php">Manage Categories</a>
     
    </li>
    <li>
      <a href="articles.php">Manage Articles</a>
    </li>
    <li>
      <a href="#">Manage Users</a>
    </li>
  </ul>
  	<div style="text-align:right">
  <h3>Welcome&nbsp;<?=$_SESSION['name']."!";?>

 &nbsp;&nbsp;
 <a href="dashboard.php?action=logout">Logout</a> 
  	</div>
</nav>