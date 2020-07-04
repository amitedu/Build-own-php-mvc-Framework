<h2>UI Option</h2>

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

<form action="<?= BASE_URL; ?>/Admin/changeColor" method="post">
  <table>
    <tr>
      <td>Pick Color</td>
      <td><input type="color" name="color"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>
</form>