<h2>Add Category</h2>
  <?php
    if(isset($postErrors)) {
      echo '<div style="border: 1px solid red; color: red; padding: 5px 10px; margin: 5px;">';
      foreach($postErrors as $key => $value) {
        switch ($key) {
          case 'name':
            foreach($value as $val){
              echo "Name: " . $val . "<br/>";
            }
          break;
          
          case 'title':
            foreach($value as $val) {
              echo "Title: " . $val . "<br/>";
            }
          break;
          
          default:
          break;
        }
      }
      echo '</div>';
    }
  ?>
  <form action="<?= BASE_URL; ?>/Admin/insertCat/" method="POST">
    <table>
      <tr>
        <td>Category Name: </td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>Category Title: </td>
        <td><input type="text" name="title"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Save" ></td>
      </tr>
    </table>
  </form>