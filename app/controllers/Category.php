<?php

class Category extends DControllers{
  public function __construct() {
    parent::__construct();
  }

  public function category() {
    $data        = array();
    $table       = 'tbl_category';
    $catModel    = $this->load->model('CatModel');
    $data['cat'] = $catModel->catList($table);
    $this->load->view('category', $data);
  }

  public function catById() {
    $data            = array();
    $table           = 'tbl_category';
    $id              = '1';
    $catModel        = $this->load->model('CatModel');
    $data['catById'] = $catModel->catById($table, $id);
    $this->load->view('catById', $data);
  }

  public function addCategory() {
    $this->load->view('addCategory');
  }
  
  public function insertCat() {
    $name  = $_POST['name'];
    $title = $_POST['title'];

    $data = array(
      'name' => $name,
      'title' => $title
    );
    $table    = 'tbl_category';
    $catModel = $this->load->model('CatModel');
    $result   = $catModel->insertCat($table, $data);
    $msgData  = array();
    if($result) {
      $msgData['msg'] = '<span style="color:blue;font-weight:bold;">Category Added successfully</span>';
    } else {
      $msgData['msg'] = '<span style="color:red;font-weight:bold;">Category can not be Added</span>';
    }
    $this->load->view('addCategory', $msgData);
  }
  
  public function updateCategory() {
    $data  = array();
    $table = 'tbl_category';
    $id    = '20';
    $catmodel = $this->load->model('catModel');
    $data['catById'] = $catmodel->catById($table, $id);
    $this->load->view('catupdate', $data);
  }

  public function updateCat() {
    $table = 'tbl_category';
    $name  = $_POST['name'];
    $title = $_POST['title'];
    $id    = $_POST['id'];
    $cond  = "id=$id";
    $data  = array(
      'name'  => $name,
      'title' => $title
    );
    $catModel = $this->load->model('CatModel');
    $result   = $catModel->updateCat($table, $cond, $data);
    $msgData  = array();
    if($result) {
      $msgData['msg'] = '<span style="color:blue;font-weight:bold;">Category updated successfully</span>';
    } else {
      $msgData['msg'] = '<span style="color:red;font-weight:bold;">Category can not update</span>';
    }
    $this->load->view('catupdate', $msgData);
  }

  public function deleteCatById() {
    $table = 'tbl_category';
    $cond  = 'id=11';
    $catModel  = $this->load->model('CatModel');
    $catModel->deleteCatById($table, $cond);
  }

  
}

?>