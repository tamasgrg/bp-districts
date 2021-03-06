<?php

//Please, provide your parameters here!
$startDistrict = 2;
$endDistrict = 11;
//

$districts = [
  [2, 5, 11, 12],
  [1, 3, 5, 12, 13],
  [2, 4, 13],
  [3, 13, 14, 15],
  [1, 2, 6, 7, 8, 9, 11, 13 ],
  [5, 7, 13, 14],
  [5, 6, 8, 14],
  [5, 7, 9, 10, 14],
  [5, 8, 10, 11, 19, 20, 21],
  [8, 9, 14, 16, 17, 18, 19],
  [1, 9, 12, 21, 22],
  [1, 2, 11],
  [2, 3, 4, 5, 6, 14],
  [4, 6, 7, 8, 10, 13, 15, 16],
  [4, 14, 16],
  [10, 14, 15, 17],
  [10, 16, 18],
  [10, 17, 19, 23],
  [9, 10, 18, 20],
  [9, 18, 19, 21, 23],
  [9, 11, 20, 22, 23],
  [11, 21],
  [18, 20, 21],
];

$visited = [];
$steps = 0;
$result;

function getShortestPath($startDistrict, $endDistrict) {
  global $result;
  $queue = [$startDistrict];
  processDistrictArray($queue, $endDistrict);
  storeResult($startDistrict, $endDistrict, $result);
  return $result;
}

function processDistrictArray($queueData, $endDistrictData) {
  global $districts;
  global $visited;
  global $steps;
  global $result;

  $neighborDistricts = [];
  
  foreach ($queueData as $district) {
    if (in_array($district, $visited) == false) {
      if ($district == $endDistrictData) {
        $result = $steps;
        return;
      }
      else {
        $visited[] = $district;
        array_push($neighborDistricts, ...$districts[$district - 1]);
      }
    }
  }

  $queue = $neighborDistricts;
  $steps++;

  processDistrictArray($queue, $endDistrictData);
}

function storeResult($startDistrict, $endDistrict, $data) {
  $conn = mysqli_connect('localhost', 'root', 'password', 'bp_districts');
  $date = date('Y-m-d H:i:s');

  $sql = "INSERT INTO results(start,end,result,time) VALUES('$startDistrict', '$endDistrict', '$data', '$date')";

  mysqli_query($conn, $sql);
}

$result = getShortestPath($startDistrict, $endDistrict);
echo $result . " kerületen kell áthaladni.";

?>
