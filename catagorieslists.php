<section>
		<ul style="list-style-type:none">
		<?php
			$categories=$x->getAll("categories","*");
			foreach($categories as $category){
				extract($category);
				?>
				<li><a href="index.php?cat_id=<?=$cat_id;?>"><?=$name;?></a>
				</li>
				<?php
			}
		?>
		</ul>
</section>