<?php

  class District {

    public $id;
    public $neighborIds;
    public $isVisited;

    public function __construct($id, $neighborIds) {
      $this->id = $id;
      $this->neighborIds = $neighborIds;
      $this->isVisited = false;
    }

  }

?>
