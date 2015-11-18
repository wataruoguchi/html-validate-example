<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
  .error {
    color: red;
  }
  </style>
</head>
<body>
  <h1>Test</h1>
  <?php
  // http://stackoverflow.com/questions/10116063/making-php-var-dump-values-display-one-line-per-value
  function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }

  $url = "index.html";
  $response = @file_get_contents($url) or die("Cannot access file: $url");
  echo "<h4>Check multiple id</h4>";
  $multi_id_pattern = "/id=[\"']([a-zA-Z0-9|-]+) +([a-zA-Z0-9|-]+)?[\"']/";
  preg_match_all($multi_id_pattern, $response, $out, PREG_SET_ORDER);
  pr($out);
  echo (count($out[0]) > 0) ? "<p class='error'>Invalid</p>" : "<p>Valid</p>";
  echo "<hr>";
  echo "<h4>Check duplicated id</h4>";
  $id_pattern = "/id=[\"']([a-zA-Z0-9|-]+)?[\"']/";
  preg_match_all($id_pattern, $response, $out, PREG_SET_ORDER);
  pr($out);

  $linerar_array = array();
  foreach ($out as $value) {
    array_push($linerar_array, $value[1]);
  }
  $count_array = array_count_values($linerar_array);
  pr($count_array);
  foreach ($count_array as $key => $value) {
    if($value>1) {
      echo "<p class='error'>Invalid</p>";
      exit();
    }
  }
  echo "<p>Valid</p>";
  ?>
</body>
</html>
