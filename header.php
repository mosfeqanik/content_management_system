<header id="header">
	<h1>
		<a href="#" id="logo">Web page designer</a>
	</h1>
		<nav id="nav">
		<a href="index.php" class="current-page-item">Homepage</a>
		<a href="RIghtsidebar.php">Two Column #1</a>
		<a href="leftsidebar.php">Two Column #2</a>
		<?php
								$menus=$x->getAllWithCondition("menus","*","status='1'");
								foreach($menus as $menu){
										extract($menu);
										?>
										<a href="index.php?menu_id=<?=$menu_id;?>"><?=$name;?></a>
										<?php
								}
							?>
		</nav>
		
</header>