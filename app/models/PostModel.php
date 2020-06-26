<?php

class PostModel extends DModel{
  public function __construct() {
    parent::__construct();
  }

  public function getAllPost($postTable, $catTable, $limit = 3) {
    $sql = "SELECT $postTable.*, $catTable.name FROM $postTable INNER JOIN $catTable ON $postTable.cat = $catTable.id ORDER BY $postTable.id DESC LIMIT $limit";
    return $this->db->select($sql);
  }

  public function getPostById($postTable, $catTable, $id) {
    $sql = "SELECT $postTable.*, $catTable.name FROM $postTable INNER JOIN $catTable ON $postTable.cat = $catTable.id WHERE $postTable.id = $id";
    return $this->db->select($sql);
  }
  
  public function postByCategory($postTable, $catTable, $catId) {
    $sql = "SELECT $postTable.*, $catTable.name FROM $postTable INNER JOIN $catTable ON $postTable.cat = $catTable.id WHERE $catTable.id = $catId";
    return $this->db->select($sql);
  }

  public function postBySearch($keyword, $catId, $postTable) {
    if(isset($keyword) && !empty($keyword)) {
      $sql = "SELECT * FROM $postTable WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
      return $this->db->select($sql);
    } elseif($catId > 0) {
      $sql = "SELECT * FROM $postTable WHERE cat = $catId";
      return $this->db->select($sql);
    }
  }
  
}

?>