<?php

  class UserModel extends DModel{

    public function __construct() {
      parent::__construct();
    }

    public function userList($table) {
      $sql = "SELECT * FROM $table";
      return $this->db->select($sql);
    }

    public function deleteUserById($table, $cond) {
      return $this->db->delete($table, $cond);
    }
  
    public function userById($table, $id) {
      $sql = "SELECT * FROM $table WHERE id = :id";
      $param = array(":id" => $id);
      return $this->db->select($sql, $param);
    }
  
    public function addUser($table, $data) {
      return $this->db->insert($table, $data);
    }
  
    public function updateUser($table, $cond, $data) {
      return $this->db->update($table, $cond, $data);
    }
  
    
  }


?>