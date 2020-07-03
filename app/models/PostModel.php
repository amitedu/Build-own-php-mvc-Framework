<?php

class PostModel extends DModel{
  public function __construct() {
    parent::__construct();
  }

  public function getAllPost($postTable, $catTable, $limit = 3) {
    $sql = "SELECT $postTable.*, $catTable.name FROM $postTable INNER JOIN $catTable ON $postTable.cat = $catTable.id ORDER BY $postTable.id DESC LIMIT $limit";
    return $this->db->select($sql);
  }

  public function getPostList($postTable, $catTable) {
    $sql = "SELECT $postTable.*, $catTable.name FROM $postTable INNER JOIN $catTable ON $postTable.cat = $catTable.id ORDER BY $postTable.id DESC";
    return $this->db->select($sql);
  }

  public function getPostById($postTable, $catTable, $id) {
    $sql = "SELECT $postTable.*, $catTable.name FROM $postTable INNER JOIN $catTable ON $postTable.cat = $catTable.id WHERE $postTable.id = $id";
    return $this->db->select($sql);
  }

  public function postById($table, $id) {
    $sql = "SELECT * FROM $table WHERE id = $id";
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

  public function insertPost($table, $data) {
    return $this->db->insert($table, $data);
  }

  public function updatePostById($table, $cond, $data) {
    return $this->db->update($table, $cond, $data);
  }

  public function deletePost($table, $id) {
    $cond = "id = $id";
    return $this->db->delete($table, $cond);
  }
  
}

?>