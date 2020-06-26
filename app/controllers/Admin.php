<?php

// Admin Controller

class Admin extends DControllers {

  public function __construct() {
    parent::__construct();
  }

  public function Index() {
    $this->home();
  }
  
  public function home() {
    $this->load->view('admin/admin');
  }
  
}

?>