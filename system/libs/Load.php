<?php

class Load{
  public function view($fileName, $data = false) {
    if($data == true) {
      extract($data);
    }
    require_once 'app/views/'.$fileName.'.php';
  }

  public function model($modelName) {
    require_once 'app/models/'.$modelName.'.php';
    return new $modelName();
  }

  public function validation($fileName) {
    require_once 'app/validation/' . $fileName . '.php';
    return new $fileName();
  }

}

?>