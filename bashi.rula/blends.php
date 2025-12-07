<?php
  include_once "lib/php/functions.php";

  $page_title  = "Velorea — Our Signature Tea Blends";
  $cart_count  = getCartCount();

  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<div class="view-window" style="background-image:url('images/teablends-hero.png'); height: 200px;">
  <div class="view-overlay">
    <h1>Our Signature Blends</h1>
    <p>Discover Velorea’s artisan tea collection — each crafted to awaken the senses and restore balance.</p>
  </div>
</div>

<!-------------- SEARCH + FILTERS BAR -------------->

<section class="container" style="margin-top:2em;">
  <div class="flex-center" style="display:flex; gap:1em; align-items:center; flex-wrap:wrap;">
    
    <input id="search-input" 
      type="text" 
      placeholder="Search blends…" 
      style="flex:1; padding:1em; border-radius:8px; border:1px solid #ccc; font-size:1.1em;">

    <select id="sort-select" 
      style="padding:1em; border-radius:8px; border:1px solid #ccc; font-size:1.1em;">
      <option value="newest">Sort By: Newest</option>
      <option value="az">A–Z</option>
      <option value="za">Z–A</option>
      <option value="lowhigh">Price: Low → High</option>
      <option value="highlow">Price: High → Low</option>
    </select>

    <select id="category-select"
      style="padding:1em; border-radius:8px; border:1px solid #ccc; font-size:1.1em;">
      <option value="all">All Categories</option>
      <option value="calming">Calming</option>
      <option value="focus">Focus / Energy</option>
      <option value="digestion">Digestion / Wellness</option>
      <option value="classic">Classic / Traditional</option>
      <option value="comfort">Comfort / Warm</option>
    </select>

    <button id="reset-btn"
      style="padding:1em 2em; border-radius:20px; background:#b99bd9; color:white; border:2px solid #3a56d4; font-size:1em;">
      Reset
    </button>

  </div>
</section>

<section class="container">
  <h2>Luxury Wellness Blends</h2>

  <ul id="product-list" class="grid grid-4">
    <?php
      $products = makeQuery(makeConn(), "SELECT * FROM products ORDER BY id ASC");

      foreach($products as $p) {
        echo "
          <li class='card product'
            data-name=\"{$p->name}\"
            data-desc=\"{$p->description}\"
            data-price=\"{$p->price}\"
            data-cat=\"{$p->category}\">

            <a href='product_item.php?id={$p->id}'>
              <img alt=\"{$p->name}\" src='images/{$p->thumbnail}'>
              <h3>{$p->name}</h3>
              <p>{$p->description}</p>
              <div class='price'>\${$p->price}</div>
            </a>

            <form method='post' action='product_item.php?id={$p->id}'
              style='display:flex; justify-content:center; gap:1em; margin-top:0.5em;'>
              
              <input type='hidden' name='add_to_cart' value='1'>
              <input type='hidden' name='qty' value='1'>
              <input type='hidden' name='weight' value='40g'>

              <button class='button' type='submit'>Add to Cart</button>
            </form>
          </li>
        ";
      }
    ?>
  </ul>
</section>

<script src="lib/js/blends.js"></script>

<?php include __DIR__ . "/parts/footer.php"; ?>
