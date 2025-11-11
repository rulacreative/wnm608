<?php
include "parts/meta.php";
include "parts/navbar.php";
include_once "lib/php/functions.php";
include_once "parts/templates.php";
?>

<div class="container">
  <div class="card soft">
    <h2>Product List</h2>

    <?php
    $result = makeQuery(
      makeConn(),
      "SELECT * FROM products ORDER BY id ASC"
    );

    echo "<div class='grid gap grid-4'>".
      array_reduce($result,'productListTemplate').
      "</div>";
    ?>
  </div>
</div>
