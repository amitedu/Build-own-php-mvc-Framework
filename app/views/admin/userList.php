<h2>User List</h2>

<?php
  if(!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    if(isset($msg)) {
      foreach($msg as $key => $value) {
        echo $value;
      }
    }
  }
?>

<table class="tblone">
    <tr>
      <th width="20%">Serial No.</th>
      <th width="30%">User Name</th>
      <th width="20%">User Level</th>
      <th width="30%">Action</th>
    </tr>
    <?php
      $i = 0;
      foreach ($userList as $key => $value) {
        $i++;
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $value['username']; ?></td>
      <td>
        <?php 
          if($value['level'] == 2) {
            echo 'Author';
          } elseif($value['level'] == 3) {
            echo 'Contributor';
          } elseif($value['level'] == 1) {
            echo 'Admin';
          }
        ?>
      </td>
      <td><a onclick="return confirm('Are you sure to Delete?');" href="<?= BASE_URL; ?>/User/deleteUser/<?= $value['id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
