<html>
  <body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <p>Kérjük, adja meg, melyik budapesti kerületből melyikbe szeretne eljutni!</p>
      <label for="start">Indulás:</label><br>
      <input type="number" id="start" name="start" min="1" max="23"><br>
      <label for="end">Érkezés:</label><br>
      <input type="number" id="end" name="end" min="1" max="23"><br>
      <input type="submit" name="submit" value="OK">
    </form>
  </body>
</html>

<?php

spl_autoload_register(function ($class_name) {
  include $class_name . '.php';
});

$districtDataInput = [
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

if (isset($_POST["submit"])) {
  $startDistrictId = $_POST["start"];
  $endDistrictId = $_POST["end"];

  $pathFinder = new PathFinder($districtDataInput, $startDistrictId, $endDistrictId);
  $pathFinder->findShortestPath();
  $result = $pathFinder->stepCount;
  echo $result . " kerületen kell áthaladni.";
}

?>
