<aside class="sidebar">
	<div class="widget">
		<h2>Category</h2>
		<ul>
			<?php
				foreach($allCat as $key => $value) {
					?>
					<li><a href="<?=BASE_URL?>/Index/postByCat/<?=$value['id']?>"><?=$value['name']?></a></li>
					<?php
				}
			?>
		</ul>
	</div>
	<div class="widget">
		<h2>Latest Post</h2>
		<ul>
				<?php
					foreach($latestPost as $key => $value) {
						?>
						<li><a href="<?=BASE_URL?>/Index/postDetails/<?=$value['id']?>"><?=$value['title']?></a></li>
						<?php
					}
				?>
		</ul>
	</div>
</aside>
