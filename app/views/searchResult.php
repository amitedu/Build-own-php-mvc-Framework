
<div class="content">
<article class="postContent">
	<?php
		foreach($postBySearch as $key => $value) {
			?>
				<div class="post">
					<div class="details">
						<div class="title">
						<h2><a href="<?= BASE_URL; ?>/Index/postDetails/<?= $value['id']; ?>"><?= $value['title'] ?></a></h2>
					</div>
					<?php
						$text = $value['content'];
						if(strlen($text) > 200) {
							$text = substr($text, 0, 200);
						}
						?>
						<p><?= $text; ?></p>
					<div class="readMore"><a href="<?= BASE_URL; ?>/Index/postDetails/<?= $value['id']; ?>">Read More...</a></div>
				</div>
			<?php
		}
	?>
</article>
