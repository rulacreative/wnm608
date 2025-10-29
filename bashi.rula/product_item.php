<?php
 
  $id = $_GET['id'] ?? 'lavender-calm';
  $page_title = "Velorea — Product";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<main class="container">
  <nav class="nav nav-crumbs">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="product_list.php">Store</a></li>
      <li><a href="#">Product</a></li>
    </ul>
  </nav>

  <div class="grid gap md:gap-2 grid-1" style="text-align:center;">
  <figure style="background:none; box-shadow:none; margin-bottom:1em;">
    <img src="img/p1.png" alt="Product image" style="max-width:50%; height:auto; display:inline-block;">
  </figure>

  <article class="card soft">
    <h2 class="h2">Sample Product Title</h2>
    <p class="body">Short description of the product benefits and flavor profile.</p>
    <p class="price h3">$18</p>

    <form style="text-align:center; margin-top:1.5em;">

  <div style="margin-bottom:2em;">

    <label style="margin-right:0.5em;">Quantity</label>
    <input type="number" min="1" value="1" style="max-width:4em; text-align:center;">
  </div>

  <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    <button class="button button-secondary" type="button" onclick="window.location.href='blends.php'">Back to Store</button>
  </div>

</form>


  </article>
</div>


</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
