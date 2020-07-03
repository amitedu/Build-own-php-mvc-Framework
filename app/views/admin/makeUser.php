<h2>Add User</h2>

<?php
  if(isset($errors)) {
    echo '<div style="border: 1px solid red; color: red; padding: 5px 10px; margin: 5px;">';
    foreach($errors as $key => $value) {
      switch ($key) {
        case 'username':
          foreach($value as $val) {
            echo 'Username: ' . $val . '<br/>';
          }
        break;
        case 'password':
          foreach($value as $val) {
            echo 'Password: ' . $val . '<br/>';
          }
        break;
        case 'level':
          foreach($value as $val) {
            echo 'User Roles: ' . $val . '<br/>';
          }
        break;
        
        default:
          
          break;
      }
    }
    echo '</div>';
  }
?>

<form action="<?= BASE_URL; ?>/User/addNewUser" method="post">
  <table>
    <tr>
      <td>User Name: </td>
      <td><input type="text" name="username"></td>
    </tr>
    <tr>
      <td>Password: </td>
      <td><input type="text" name="password"></td>
    </tr>
    <tr>
      <td>User Roles: </td>
      <td>
        <select name="level" class="cat">
          <option>Select Option</option>
          <option value="2">Author</option>
          <option value="3">Contributor</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="create" value="Create User"></td>
    </tr>
  </table>
</form>