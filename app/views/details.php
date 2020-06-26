<div class="content">
Home<hr/>
<article class="postContent">
<?php
  foreach($postById as $key => $value) {
    ?>
  <div class="details">
    <div class="title">
      <h2><?= $value['title'] ?></h2>
      <p>Category : <a href="<?= BASE_URL; ?>/Index/postByCat/<?= $value['id'] ?>"><?= $value['name']; ?></a></p>
    </div>
    <div class="desc">
      <p><?= $value['content']; ?></p>
    </div>
  </div>
  <?php
  }
?>
</article>



