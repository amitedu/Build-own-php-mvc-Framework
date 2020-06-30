<?php

class Login extends DControllers{

  public function __construct() {
    parent::__construct();
  }

  public function Index() {
    $this->login();
  }

  public function login() {
    Session::init();
    if(Session::get('login') == true) {
      header("Location:".BASE_URL."/Admin");
    }
    $this->load->view("login/login");
  }

  public function loginAuth() {
    $table    = 'tbl_users';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginModel = $this->load->model('LoginModel');
    $count      = $loginModel->userControl($table, $username, $password);

    if($count > 0) {
      $loginModel = $this->load->model('LoginModel');
      $userData   = $loginModel->getUserData($table, $username, $password);

      Session::init();
      Session::set('login', true);
      Session::set('id', $userData[0]['username']);
      Session::set('username', $userData[0]['username']);
      header("Location:".BASE_URL."/Admin");
    } else {
      header("Location: " . BASE_URL . "/Login");
    }
  }

  public function logout() {
    Session::init();
    Session::destroy();
    header("Location: " . BASE_URL . "/Login");
  }
  
}

?>