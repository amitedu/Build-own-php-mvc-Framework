<?php

class Index extends DControllers{
  public function __construct() {
    parent::__construct();
  }

  public function Index() {
    $this->home();
  }

  public function home() {
    $data = array();
    $postTable = 'tbl_posts';
    $catTable  = 'tbl_category';

    $this->load->view('header');

    $catModel = $this->load->model('CatModel');
    $data['allCat'] = $catModel->catList($catTable);

    $this->load->view('search', $data);

    $postModel = $this->load->model('PostModel');
    $data['allPost'] = $postModel->getAllPost($postTable, $catTable);

    $this->load->view('content', $data);


    $limit = 5;
    $latestPost = $this->load->model('PostModel');
    $data['latestPost'] = $latestPost->getAllPost($postTable, $catTable, $limit);
    
    $this->load->view('sidebar', $data);
    $this->load->view('footer');
  }

  public function postDetails($postId=NULL) {
    $data = array();
    $postTable = 'tbl_posts';
    $catTable  = 'tbl_category';

    $this->load->view('header');
  
    $catModel = $this->load->model('CatModel');
    $data['allCat'] = $catModel->catList($catTable);

    $this->load->view('search', $data);

    $postModel = $this->load->model('PostModel');
    $data['postById'] = $postModel->getPostById($postTable, $catTable, $postId);

    $this->load->view('details', $data);

    $limit = 5;
    $latestPost = $this->load->model('PostModel');
    $data['latestPost'] = $latestPost->getAllPost($postTable, $catTable, $limit);

    $this->load->view('sidebar', $data);
    $this->load->view('footer');
  }

  public function postByCat($catId=NULL) {
    $data = array();
    $postTable = 'tbl_posts';
    $catTable  = 'tbl_category';

    $this->load->view('header');

    $catModel = $this->load->model('CatModel');
    $data['allCat'] = $catModel->catList($catTable);
    
    $this->load->view('search', $data);

    $postModel = $this->load->model('PostModel');
    $data['postByCat'] = $postModel->postByCategory($postTable, $catTable, $catId);

    $this->load->view('postByCategory', $data);

    $limit = 5;
    $latestPost = $this->load->model('PostModel');
    $data['latestPost'] = $latestPost->getAllPost($postTable, $catTable, $limit);
    
    $this->load->view('sidebar', $data);
    $this->load->view('footer');
  }
  
  public function search() {
    $data      = array();
    $catTable  = 'tbl_category';
    $postTable = 'tbl_posts';
    $keyword   = $_POST['keyword'];
    $catId     = $_POST['catSearch'];

    if(empty($keyword) && $catId == 0) {
      header("Location: ".BASE_URL."/Index/home");
    }

    $catModel = $this->load->model('CatModel');
    $data['allCat'] = $catModel->catList($catTable);

    $limit = 5;
    $postModel = $this->load->model('PostModel');
    $data['latestPost'] = $postModel->getAllPost($postTable, $catTable, $limit);

    $this->load->view('header');

    $this->load->view('search', $data);
    
    $data['postBySearch'] = $postModel->postBySearch($keyword, $catId, $postTable);
    
    $this->load->view('searchResult', $data);

    
    $this->load->view('sidebar', $data);
    
    $this->load->view('footer');
  }

  public function notFound() {
    $this->load->view('404');
  }
  
}

?>