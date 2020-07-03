<?php

class User extends DControllers{

  public function __construct() {
    parent::__construct();
  }

  public function Index() {
    $this->makeUser();
  }

  public function makeUser() {
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/makeUser');
    $this->load->view('admin/footer');
  }

  public function addNewUser() {
    if(!($_POST)) {
      header("Location: " . BASE_URL . "/User");
    }

    $data = array();
    $validation = $this->load->validation('DForm');

    $validation->post('username')->isEmpty()->length(3, 15);
    $validation->post('password')->isEmpty()->length(3, 20);
    $validation->post('level')->isCatEmpty();

    if($validation->submit()) {
      $tableUser = 'tbl_users';
      $data = array(
        'username' => $validation->values['username'],
        'password' => $validation->values['password'],
        'level' => $validation->values['level']
      );

      $userModel = $this->load->model('UserModel');
      $result = $userModel->addUser($tableUser, $data);

      $msgData = array();
      if($result) {
        $msgData['msg'] = '<span style="color:blue;font-weight:bold;">User created successfully</span>';
      } else {
        $msgData['msg'] = '<span style="color:blue;font-weight:bold;">User not created</span>';
      }

      $url = BASE_URL . "/User/listUser?msg=" . urlencode(serialize($msgData));
      header("Location: $url");
    } else {
      $data['errors'] = $validation->errors;

      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/makeUser', $data);
      $this->load->view('admin/footer');
    }
    
  }

  public function listUser() {
    $data = array();
    $tableUser = 'tbl_users';

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');

    $userModel = $this->load->model('UserModel');
    $data['userList'] = $userModel->userList($tableUser);

    $this->load->view('admin/userList', $data);
    $this->load->view('admin/footer');
  }

  public function deleteUser($id) {
    $tableUser = 'tbl_users';
    $cond = "id=$id";

    $userModel = $this->load->model('UserModel');
    $result = $userModel->deleteUserById($tableUser, $cond);

    $msgData = array();
    if($result) {
      $msgData['msg'] = '<span style="color:blue;font-weight:bold;">User deleted successfully</span>';
    } else {
      $msgData['msg'] = '<span style="color:blue;font-weight:bold;">User not deleted</span>';
    }

    $url = BASE_URL . "/User/listUser?msg=" . urlencode(serialize($msgData));
    header("Location: $url");
  }
  
}

?>