<?php

class Session{

  public static function init() {
    session_start();
  }
  
  public static function set($key, $value) {
    $_SESSION[$key] = $value;
  }

  public static function get($key) {
    if(isset($_SESSION[$key])) {
      return $_SESSION[$key];
    }
  }

  public static function checkSession() {
    self::init();
    if(self::get('login') == false) {
      self::init();
      self::destroy();
      header("Location: " . BASE_URL . "/Login");
    }
  } 
  
  public static function destroy() {
    session_destroy();
  }
  
}

?>