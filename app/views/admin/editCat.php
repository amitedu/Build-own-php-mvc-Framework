
<h2>Update Category</h2>
<?php
foreach($catById as $key => $value) {
  ?>

    <form action="<?= BASE_URL; ?>/Admin/updateEditCat/<?= $value['id']; ?>" method="POST">
      <table>
        <tr>
          <td>Category Name: </td>
          <td><input type="text" name="name" value="<?= $value['name']; ?>" ></td>
        </tr>
        <tr>
          <td>Category Title: </td>
          <td><input type="text" name="title" value="<?= $value['title']; ?>" ></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Update" ></td>
        </tr>
      </table>
    </form>

<?php
}  
?>
