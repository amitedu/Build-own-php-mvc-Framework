
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<h2>Article List</h2>

<?php
  if(!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach($msg as $key => $value) {
      echo $value;
    }
  }
?>

<table id="myTable" class="display" data-page-length='5'>
  <thead>
    <tr>
      <th width="5%">No</th>
      <th width="20%">Title</th>
      <th width="35%">Content</th>
      <th width="15%">Category</th>
      <th width="25%">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;
    foreach($postList as $key => $value) {
    $i++;
  ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $value['title']; ?></td>
      <td>
        <?php 
          $text = $value['content']; 
          if(strlen($text) > 40) {
            $text = substr($text, 0, 40);
          }
          echo $text;
        ?>
      </td>
      <td><?= $value['name']; ?></td>
      <?php
        if(Session::get('level') != 2 && Session::get('level') != 3) {
      ?>
      <td><a href="<?= BASE_URL; ?>/Admin/displayEditArticle/<?= $value['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete?');" href="<?= BASE_URL; ?>/Admin/deleteArticle/<?= $value['id']; ?>">Delete</a></td>
      <?php
        } else {
          echo '<td>Not Applicable</td>';
        }
      ?>
    </tr>
  <?php } ?>

  </tbody>
</table>

<script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
