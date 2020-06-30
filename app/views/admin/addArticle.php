<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<h2>Add Article</h2>

<form action="<?= BASE_URL; ?>/Admin/insertPost/" method="POST">
  <table>
    <tr>
      <td>Article Title: </td>
      <td><input type="text" name="title" required="1" ></td>
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