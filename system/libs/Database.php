<?php

  class Database extends PDO{
    public function __construct($dsn, $user, $pass) {
      parent::__construct($dsn, $user, $pass);
    }

    public function select($sql, $param = array(), $fetchStyle = PDO::FETCH_ASSOC) {
      $stmt = $this->prepare($sql);
      foreach ($param as $key => $value) {
        $stmt->bindParam($key, $value);
      }
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function insert($table, $data) {
      $keys = implode(', ', array_keys($data));
      $values = ":" . implode(', :', array_keys($data));
      $sql = "INSERT INTO $table($keys) VALUES($values)";
      $stmt = $this->prepare($sql);
      // If we use bindParam function then $value must be handled by reference...WHY?
      // foreach ($data as $key => &$value) {
      //   $stmt->bindParam(":$key", $value);
      // }
      foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
      }
      return $stmt->execute();
    }

    public function update($table, $cond, $data) {
      $updateKeys = NULL;
      foreach ($data as $key => $value) {
        $updateKeys .= "$key=:$key,";
      }
      $updateKeys = rtrim($updateKeys, ',');
      $sql = "UPDATE $table SET $updateKeys WHERE $cond";
      $stmt = $this->prepare($sql);
      foreach ($data as $key => $value) {
        $stmt->bindParam(":$key", $value);
      }
      return $stmt->execute();
    }

    public function delete($table, $cond, $limit = '1') {
      $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
      return $this->exec($sql);
    }

    public function affectedRows($sql, $username, $password) {
      try {
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username, $password));
        $result = $stmt->rowCount();
        $stmt = NULL;
        return $result;
      } catch (Exception $e) {
        echo $e->getMessage();
      }      
    }

    public function selectUserData($sql, $username, $password) {
      try {
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username, $password));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $result;
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }
    
  }


?>