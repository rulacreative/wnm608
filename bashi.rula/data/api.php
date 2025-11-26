<?php
include "../php/functions.php";

$type = $_GET['type'] ?? "";

if($type == "products") {
  $result = makeConn()->query("SELECT * FROM products");
  $rows = [];
  while($row = $result->fetch_assoc()) $rows[] = $row;

  echo json_encode($rows);
  exit;
}

echo json_encode(["error"=>"Invalid API request"]);
