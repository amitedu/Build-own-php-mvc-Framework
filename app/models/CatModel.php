<?php

class CatModel extends DModel{
  public function __construct() {
    parent::__construct();
  }

  public function catList($table) {
    $sql = "SELECT * FROM $table";
    return $this->db->select($sql);
  }

  public function catById($table, $id) {
    $sql = "SELECT * FROM $table WHERE id = :id";
    $param = array(":id" => $id);
    return $this->db->select($sql, $param);
  }

  public function insertCat($table, $data) {
    return $this->db->insert($table, $data);
  }

  public function updateCat($table, $cond, $data) {
    return $this->db->update($table, $cond, $data);
  }

  public function deleteCatById($table, $cond) {
    return $this->db->delete($table, $cond);
  }
  
}


?>