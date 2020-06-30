<h2>Add Category</h2>
  <?php
    if(isset($msg)) {
      echo $msg;
    }
  ?>
  <form action="<?= BASE_URL; ?>/Admin/insertCat/" method="POST">
    <table>
      <tr>
        <td>Category Name: </td>
        <td><input type="text" name="name" required="1" ></td>
      </tr>
      <tr>
        <td>Category Title: </td>
        <td><input type="text" name="title" required="1" ></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Save" ></td>
      </tr>
    </table>
  </form>