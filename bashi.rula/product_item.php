<?php
include_once "lib/php/functions.php";
include "parts/meta.php";
include "parts/navbar.php";

$id = $_GET['id'] ?? 0;
$result = makeQuery(makeConn(), "SELECT * FROM products WHERE id=$id");

if(count($result) > 0) {
  $product = $result[0];
} else {
  echo "<div class='container'><p>Product not found.</p></div>";
  die();
}
?>

<div class="container">
  <div class="card soft" style="text-align:center;">

    <h2><?= $product->name ?></h2>
    

    <img src="images/<?= $product->images ?>" alt="<?= $product->name ?>" 
    style="max-width:400px; display:block; margin:1em auto; float:none; text-align:center;">

     
    <p><strong>Price:</strong> $<?= $product->price ?></p>
    <p><?= $product->description ?></p>
 

  <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    <button class="button button-secondary" type="button" onclick="window.location.href='blends.php'">Back to Store</button>
  </div>



  </div>
</div>


 