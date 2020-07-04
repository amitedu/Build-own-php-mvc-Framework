<?php

  class UiModel extends DModel{

    public function __construct() {
      parent::__construct();
    }

    public function updateColor($tableColor, $cond, $data) {
      return $this->db->update($tableColor, $cond, $data);
    }

    public function getBgColor($tableColor, $cond) {
      return $this->db->selectByCondition($tableColor, $cond);
    }
    
  }

?>