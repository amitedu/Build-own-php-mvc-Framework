<?php

class Delowar extends DControllers{
  public function __construct() {
    parent:: __construct();
  }

  public function jahan($param = 'default') {
    echo "Calling from function Jahan with parameter $param";
  }
  
}

?>