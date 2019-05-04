<div class="container">
	<div class="row main-row">
		<div class="left-content">
			<section>
					<h2>Welcome to Web Page designer!</h2>
					<p>This is <strong>web Page designer</strong>, a fully responsive HTML5 site template designed by and released for free by. It features
					a simple, lightweight design, solid HTML5 and CSS3 code, and full responsive support for desktop, tablet, and mobile displays.</p>
				<footer class="controls">
					<a href="#" class="button">More cool designs ...</a>
				</footer>
			</section>
		</div>
				<div class="left-content">
					<section>
						<?php
		if(isset($_REQUEST['menu_id'])){
			$menu_id=$_REQUEST['menu_id'];
			extract($x->getById("menus","*","menu_id='$menu_id'"));
			echo "<h2>".$name."</h2>";
			echo "<p>".$content."</p>";
		}
		elseif(isset($_REQUEST['cat_id'])){
			$cat_id=$_REQUEST['cat_id'];
			$all_articles=$x->getAllWithCondition('articles',"*","cat_id=$cat_id");
			foreach($all_articles as $article){
				extract($article);
				echo "<h2>$title</h2>";
				//echo "<p>$content</p>";
				//print_r($article);
				echo $x->readMore($content,0,50,$art_id,"Read more..");

			}
		}

		elseif(isset($_REQUEST['readmore'])){
			$readmore=$_REQUEST['readmore'];
			extract($x->getById("articles","*","art_id='$readmore'"));
			echo "<h2>".$title."</h2>";
			echo "<p>".$content."</p>";
		}

		else{
			echo "<h2>Home Page</h2>";
		}
	?>
		
		
					</section>
				</div>
	</div>
					<div class="row main-row">
						<div class="middle-content">
				<?php
				include ('catagorieslists.php');
				?>
							<section>
								<h2>An assortment of pictures and text</h2>
								<p>Duis neque nisi, dapibus sed mattis quis, rutrum et accumsan.
								Suspendisse nibh. Suspendisse vitae magna eget odio amet mollis
								justo facilisis quis. Sed sagittis mauris amet tellus gravida
								lorem ipsum dolor sit amet consequat blandit lorem ipsum dolor
								sit amet consequat sed dolore.</p>
								<ul class="big-image-list">
									<li>
										<a href="#"><img src="images/pic3.jpg" alt="" class="left" /></a>
										<h3>Magna Gravida Dolore</h3>
										<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo
										facilisis amet quis consectetur in, sollicitudin vitae justo. Cras
										Maecenas eu arcu purus, phasellus fermentum elit.</p>
									</li>
									<li>
										<a href="#"><img src="images/pic4.jpg" alt="" class="left" /></a>
										<h3>Magna Gravida Dolore</h3>
										<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo
										facilisis amet quis consectetur in, sollicitudin vitae justo. Cras
										Maecenas eu arcu purus, phasellus fermentum elit.</p>
									</li>
									<li>
										<a href="#"><img src="images/pic5.jpg" alt="" class="left" /></a>
										<h3>Magna Gravida Dolore</h3>
										<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo
										facilisis amet quis consectetur in, sollicitudin vitae justo. Cras
										Maecenas eu arcu purus, phasellus fermentum elit.</p>
									</li>
								</ul>
							</section>
						</div>
	</div>
</div>