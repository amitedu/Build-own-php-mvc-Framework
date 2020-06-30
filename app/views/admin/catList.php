<h2>Category List</h2>

<?php

  if(!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach($msg as $key => $value) {
      echo $value;
    }
  }

?>

  <table class="tblone">
    <tr>
      <th>Serial No.</th>
      <th>Category Name</th>
      <th>Category Title</th>
      <th>Action</th>
    </tr>
    <?php
      $i = 0;
      foreach ($cat as $key => $value) {
        $i++;
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $value['name']; ?></td>
      <td><?= $value['title']; ?></td>
      <td><a href="<?= BASE_URL; ?>/admin/displayEditCat/<?= $value['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete?');" href="<?= BASE_URL; ?>/admin/deleteCat/<?= $value['id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
