<div class="content">
	Admin Page <span style="float: right;"><a style="text-decoration: none;" href="<?= BASE_URL; ?>">Visit Website</a></span>
	<hr>
	<aside class="adminLeft">
		<div class="widget">
			<h3>Site Option</h3>
			<ul>
				<li><a href="<?= BASE_URL; ?>/Admin">Home</a></li>
				<li><a href="<?= BASE_URL; ?>/Admin/uioption">UI Option</a></li>
				<li><a href="<?= BASE_URL; ?>/Login/logout">Logout</a></li>
			</ul>
		</div>

		<?php
			if(Session::get('level') !=2 && Session::get('level') != 3) {
		?>
		<div class="widget">
			<h3>User Option</h3>
			<ul>
				<li><a href="<?= BASE_URL; ?>/User/makeUser">Add User</a></li>
				<li><a href="<?= BASE_URL; ?>/User/listUser">User List</a></li>
			</ul>
		</div>
		<?php
			}
		?>

		<?php
			if(Session::get('level') != 3) {
		?>
		<div class="widget">
			<h3>Category Option</h3>
			<ul>
				<li><a href="<?= BASE_URL; ?>/Admin/addCategory">Add Category</a></li>
				<li><a href="<?= BASE_URL; ?>/Admin/category">Category List</a></li>
			</ul>
		</div>
		<?php
			}
		?>

		<div class="widget">
			<h3>Post Option</h3>
			<ul>
				<li><a href="<?= BASE_URL; ?>/Admin/addArticle">Add Artticle</a></li>
				<li><a href="<?= BASE_URL; ?>/Admin/articleList">Article List</a></li>
			</ul>
		</div>
	</aside>
	<article class="adminRight">
