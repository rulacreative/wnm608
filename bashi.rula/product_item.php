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

  <div class="grid gap md:gap-2 grid-2-1">
    <figure class="card">
      <img src="img/p1.png" alt="Product image">
    </figure>
    <article class="card soft">
      <h2 class="h2">Sample Product Title</h2>
      <p class="body">Short description of the product benefits and flavor profile.</p>
      <p class="price h3">$18</p>

      <form>
        <label>Quantity</label>
        <input type="number" min="1" value="1">
        <button class="button">Add to Cart</button>
      </form>
    </article>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
