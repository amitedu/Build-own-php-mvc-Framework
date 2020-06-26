<?php
spl_autoload_register(function($class){
  require_once "system/libs/".$class.".php";
});
require_once 'app/config/Config.php';

$main = new Main();


?>

