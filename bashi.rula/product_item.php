<?php
include_once "lib/php/functions.php";

$id = $_GET['id'] ?? 0;
$result = makeQuery(makeConn(), "SELECT * FROM products WHERE id=$id");

if(count($result) > 0) {
  $product = $result[0];
} else {
  echo "<div class='container'><p>Product not found.</p></div>";
  die();
}

$page_title = "Velorea — Product";
$cart_count = getCartCount();

include "parts/meta.php";
include "parts/navbar.php";
?>

<div class="container">
  <nav class="nav nav-crumbs">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="blends.php">Store</a></li>
      <li class="active"><a href="#">Product</a></li>
    </ul>
  </nav>

  <div class="card soft" style="text-align:center;">
    <h2><?= htmlspecialchars($product->name) ?></h2>

    <img src="images/<?= htmlspecialchars($product->images) ?>"
         alt="<?= htmlspecialchars($product->name) ?>"
         style="max-width:400px; display:block; margin:1em auto;">




    <!-- PRICE -->
    <p><strong>Price:</strong>
      <span class="product-price" data-base="<?= $product->price ?>">
        $<?= number_format($product->price, 2) ?>
      </span>
    </p>

    <p><?= htmlspecialchars($product->description) ?></p>

    <form method="post" action="cart_review.php" style="margin-top:1.5em;">
      <input type="hidden" name="action" value="add">
      <input type="hidden" name="id" value="<?= (int)$product->id ?>">
      <input type="hidden" name="name" value="<?= htmlspecialchars($product->name) ?>">





      <!-- hidden field that will be updated by JS -->
      <input type="hidden" id="dynamic-price" name="price" value="<?= $product->price ?>">

      <input type="hidden" name="image" value="<?= htmlspecialchars($product->images) ?>">

      <div style="margin-bottom:1em;">
        <label for="weight">Tea Weight</label>
        <select id="weight" name="weight" style="padding:0.5em; margin-left:0.5em;">
          <option value="40g" data-add="0">40g (Base Price)</option>
          <option value="60g" data-add="5">60g (+$5)</option>
        </select>
      </div>

      <div style="margin-bottom:1.5em;">
        <label for="qty">Quantity</label>
        <input id="qty" name="qty" type="number" min="1" value="1" style="max-width:4em; text-align:center;">
      </div>

      <div class="product-button-row" style="display:flex; justify-content:center; gap:1em;">

        <button class="button" type="submit">Add to Cart</button>
 
      </div>
    </form>
  </div>
</div>






<!-- SIMPLE FIXED PRICE SCRIPT (+$5 RULE) -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const priceEl = document.querySelector(".product-price");
    const weightEl = document.querySelector("#weight");
    const hiddenPriceInput = document.querySelector("#dynamic-price");

    if (!priceEl || !weightEl || !hiddenPriceInput) return;

    const basePrice = parseFloat(priceEl.dataset.base);

    function updatePrice() {
        const add = parseFloat(weightEl.selectedOptions[0].dataset.add);
        const finalPrice = basePrice + add;

        priceEl.textContent = "$" + finalPrice.toFixed(2);
        hiddenPriceInput.value = finalPrice.toFixed(2);
    }

    weightEl.addEventListener("change", updatePrice);
    updatePrice(); // run on load
});
</script>

</body>
</html>
