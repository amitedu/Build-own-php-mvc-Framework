<!-- Main Class -->

<?php

  class Main {
    protected $url;
    protected $controllerName = "Index";
    protected $controllerPath = "app/controllers/";
    protected $controller;
    protected $methodName = "Index";

    public function __construct() {
      $this->getUrl();
      $this->loadController();
      $this->loadMethod();
    }    

    public function getUrl() {
      if(isset($_GET['url'])) {
        $this->url = $_GET['url'];
        $this->url = rtrim($this->url, '/');
        $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
      } else {
        $this->url = NULL;
      }
    }
    
    public function loadController() {
      if(!isset($this->url[0])) {
        require_once $this->controllerPath . $this->controllerName . ".php";
        $this->controller = new $this->controllerName();
      } else {
        $this->controllerName = $this->url[0];
        $file = $this->controllerPath . $this->controllerName . ".php";
        if(file_exists($file)) {
          require_once $file;
          if(class_exists($this->controllerName)) {
            $this->controller = new $this->controllerName();
          } else {
            header("Location : " . BASE_URL . "/Index");
          }
        } else {
          header("Location : " . BASE_URL . "/Index");
        }
      }
    }

    public function loadMethod() {
      if(isset($this->url[2])) {
        $this->methodName = $this->url[1];
        if(method_exists($this->controller, $this->methodName)) {
          $this->controller->{$this->methodName}($this->url[2]);
        } else {
          header("Location: " . BASE_URL . "/Index/notFound");
        }
      } else {
        if(isset($this->url[1])) {
          $this->methodName = $this->url[1];
          if(method_exists($this->controller, $this->methodName)) {
            $this->controller->{$this->methodName}();
          } else {
            header("Location: " . BASE_URL . "/Index/notFound");
          }
        } else {
          if(method_exists($this->controller, $this->methodName)) {
            $this->controller->{$this->methodName}();
          } else {
            header("Location: " . BASE_URL . "/Index/notFound");
          }
        }
      }
    }
    
  }



?>