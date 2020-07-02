<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<h2>Add Article</h2>
<?php
  if(isset($postErrors)) {
    echo '<div style="border: 1px solid red; color: red; padding: 5px 10px; margin: 5px">';
    foreach($postErrors as $key => $value) {
      switch($key) {
        case 'title':
          foreach($value as $val) {
            echo "Title: ". $val . "<br/>";
          }
        break;

        case 'content':
          foreach($value as $val) {
            echo "Content: " . $val . "<br/>";
          }
        break;

        case 'cat':
          foreach ($value as $val) {
            echo "Category: " . $val . "<br/>";
          }
        break;

        default:
        break;
      }
    }
    echo '</div>';
  }

?>
<form action="<?= BASE_URL; ?>/Admin/insertPost/" method="POST">
  <table>
    <tr>
      <td>Title: </td>
      <td><input type="text" name="title"></td>
    </tr>
    <tr>
      <td>Content: </td>
      <td>
        <textarea name="content"></textarea>
        <script>
          CKEDITOR.replace( 'content' );
        </script>
      </td>
    </tr>
    <tr>
      <td>Category: </td>
      <td>
        <select name="cat" class="cat">
          <option>Select Category</option>
          <?php
            foreach($catList as $key => $value) {
          ?>
            <option value="<?= $value['id']; ?>"><?= $value['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Save" ></td>
    </tr>
  </table>
</form>