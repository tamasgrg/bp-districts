<?php

  class PathFinder {

    public $districtDataInput;
    public $startDistrictId;
    public $endDistrictId;
    public $allDistricts;
    public $queue;
    public $stepCount;

    public function __construct($districtDataInput, $startDistrictId, $endDistrictId) {
      $this->districtDataInput = $districtDataInput;
      $this->startDistrictId = $startDistrictId;
      $this->endDistrictId = $endDistrictId;
      $this->stepCount = 0;
      $this->setUpDistricts();
    }

    public function setUpDistricts() {
      for ($i = 0; $i < sizeof($this->districtDataInput); $i++) { 
        $newDistrict = new District($i + 1, $this->districtDataInput[$i]);
        $this->allDistricts[] = $newDistrict;
        if ($i + 1 == $this->startDistrictId) $this->queue = array($newDistrict);
      }
    }

    public function findShortestPath() {
      $neighborDistricts = [];

      foreach ($this->queue as $currentDistrict) {
        if ($currentDistrict->id == $this->endDistrictId) {
          return;

        } else {
          $currentDistrict->isVisited = true;
          foreach ($currentDistrict->neighborIds as $neighborId) {
            if ($this->allDistricts[$neighborId - 1]->isVisited == false) $neighborDistricts[] = $this->allDistricts[$neighborId - 1];
          }
        }
      }

      $this->queue = $neighborDistricts;
      $this->stepCount++;
      $this->findShortestPath();
    }

  }

?>
