<?php

// Admin Controller

class Admin extends DControllers {

  public function __construct() {
    parent::__construct();
    Session::checkSession();
  }

  public function Index() {
    $this->home();
  }
  
  public function home() {
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/home');
    $this->load->view('admin/footer');
  }

  
  public function addCategory() {
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/addCategory');
    $this->load->view('admin/footer');
  }

  
  public function category() {
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');

    $data        = array();
    $table       = 'tbl_category';
    $catModel    = $this->load->model('CatModel');
    $data['cat'] = $catModel->catList($table);
    
    $this->load->view('admin/catList', $data);
    $this->load->view('admin/footer');
  }

  
  public function insertCat() {

    if(!($_POST)) {
      header("Location: " . BASE_URL . "/Admin/addCategory");
    }

    $validation = $this->load->validation('DForm');

    $validation->post('name')->isEmpty()->length(5, 50);
    $validation->post('title')->isEmpty()->length(5, 50);

    if($validation->submit()) {
      $data = array(
        'name' => $_POST['name'],
        'title' => $_POST['title']
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
  
      $url = BASE_URL."/admin/category?msg=". urlencode(serialize($msgData));
      
      header("Location: $url");
    } else {
      $data = array();
      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      
      $data['postErrors'] = $validation->errors;
      
      $this->load->view('admin/addCategory', $data);
      $this->load->view('admin/footer');
  
    }
    
  }

  
  public function displayEditCat($id) {
    $data  = array();
    $table = 'tbl_category';

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');

    $catmodel = $this->load->model('catModel');
    $data['catById'] = $catmodel->catById($table, $id);
    $this->load->view('admin/editCat', $data);
    $this->load->view('admin/footer');
  }

  
  public function updateEditCat($id) {
    $table = 'tbl_category';
    $name  = $_POST['name'];
    $title = $_POST['title'];
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

    $url = BASE_URL . "/admin/category?msg=" . urlencode(serialize($msgData));
    header("Location: $url");
  }

  
  public function deleteCat($id) {
    $table = 'tbl_category';
    $cond  = "id=$id";
    $catModel = $this->load->model('CatModel');
    $result   = $catModel->deleteCatById($table, $cond);

    $msgData  = array();
    if($result) {
      $msgData['msg'] = '<span style="color:blue;font-weight:bold;">Category deleted successfully</span>';
    } else {
      $msgData['msg'] = '<span style="color:red;font-weight:bold;">Category can not be deleted</span>';
    }

    $url = BASE_URL . "/admin/category?msg=" . urlencode(serialize($msgData));
    header("Location: $url");
  }

  
  public function addArticle() {
    $table = 'tbl_category';
    $data  = array();

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');

    $catModel = $this->load->model('CatModel');
    $data['catList']   = $catModel->catList($table);

    $this->load->view('admin/addArticle', $data);
    $this->load->view('admin/footer');
  }

  
  public function articleList() {
    $tablePost = 'tbl_posts';
    $tableCat  = 'tbl_category';
    $data      = array();
    
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');

    // $catModel = $this->load->model('CatModel');
    // $data['catList']   = $catModel->catList($tablePost);

    $postModel = $this->load->model('PostModel');
    $data['postList'] = $postModel->getPostList($tablePost, $tableCat);
    
    $this->load->view('admin/articleList', $data);
    $this->load->view('admin/footer');
  }

  
  public function insertPost() {

    if(!($_POST)) {
      header("Location: " . BASE_URL . "/Admin/addArticle");
    }
    $input = $this->load->validation('DForm');

    $input->post('title')->isEmpty()->length(10, 50);
    $input->post('content')->isEmpty();
    $input->post('cat')->isCatEmpty();
    
    if($input->submit()) {
      $data = array(
        'title' => $input->values['title'],
        'content' => $input->values['content'],
        'cat' => $input->values['cat']
      );
      $table    = 'tbl_posts';
  
      $postModel = $this->load->model('PostModel');
      $result   = $postModel->insertPost($table, $data);
  
      $msgData  = array();
      if($result) {
        $msgData['msg'] = '<span style="color:blue;font-weight:bold;">Post Added successfully</span>';
      } else {
        $msgData['msg'] = '<span style="color:red;font-weight:bold;">Post can not be Added</span>';
      }
  
      $url = BASE_URL . "/admin/articleList?msg=" . urlencode(serialize($msgData));
      header("Location: $url");
    } else {
      $data  = array();
      $table = 'tbl_category';
      $data['postErrors'] = $input->errors;
  
      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
  
      $catModel = $this->load->model('CatModel');
      $data['catList']   = $catModel->catList($table);
  
      $this->load->view('admin/addArticle', $data);
      $this->load->view('admin/footer');
  
    }
  }
  
}

?>