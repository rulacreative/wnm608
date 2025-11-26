<?php
  include_once "lib/php/functions.php";

  $page_title  = "Velorea — Our Signature Tea Blends";
  $cart_count  = getCartCount();
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<div class="view-window" style="background-image:url('images/teablends-hero.png')">
  <div class="view-overlay">
    <h1>Our Signature Blends</h1>
    <p>Discover Velorea’s artisan tea collection — each crafted to awaken the senses and restore balance.</p>
  </div>
</div>

<!-- SEARCH + FILTERS BAR -->
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

    <!-- PRODUCT CARDS -->
    <?php
      $products = [
        [1,"Lavender Calm","Soft floral notes to relax body and mind.",18,"images/p1.png","calming"],
        [2,"Mint Focus","Cool mint that refreshes and sharpens focus.",16,"images/p2.png","focus"],
        [3,"Ginger Digest","Warm spice that supports calm digestion.",17,"images/p3.png","digestion"],
        [4,"Chamomile Dream","Golden calm in a cup — your bedtime ritual begins here.",15,"images/p4.png","calming"],
        [5,"Rose Harmony","Delicate rose for moments of inner peace.",19,"images/p5.png","calming"],
        [6,"Citrus Glow","Zesty citrus that uplifts and energizes.",17,"images/p6.png","focus"],
        [7,"Chai Tranquil","Spiced warmth that comforts and grounds.",18,"images/p7.png","comfort"],
        [8,"Jasmine Muse","Fragrant jasmine that inspires calm focus.",20,"images/p8.png","focus"],
        [9,"Earl Grey Luxe","Classic black tea with notes of bright bergamot.",19.5,"images/p9.png","classic"],
        [10,"Moroccan Mint","A timeless Moroccan blend of green tea and refreshing mint.",16.5,"images/p10.png","classic"],
        [11,"Hibiscus Breeze","Tart ruby hibiscus with a cooling floral finish.",15.5,"images/p11.png","comfort"],
        [12,"Turmeric Soothe","Golden turmeric with ginger for gentle warmth.",17.5,"images/p12.png","digestion"]
      ];

      foreach($products as $p) {
        echo "
        <li class='card product' data-name='{$p[1]}' data-desc='{$p[2]}' data-price='{$p[3]}' data-cat='{$p[5]}'>
          <a href='product_item.php?id={$p[0]}'><img alt='{$p[1]}' src='{$p[4]}'>
          <h3>{$p[1]}</h3><p>{$p[2]}</p><div class='price'>\${$p[3]}</div></a>

          <form method='post' action='product_item.php?id={$p[0]}' 
          style='display:flex; justify-content:center; gap:1em; margin-top:0.5em;'>
            <input type='hidden' name='add_to_cart' value='1'>
            <input type='hidden' name='qty' value='1'>
            <input type='hidden' name='weight' value='40g'>
            <button class='button' type='submit'>Add to Cart</button>
          </form>
        </li>";
      }
    ?>
  </ul>
</section>

<script src="lib/js/blends.js"></script>

<?php include __DIR__ . "/parts/footer.php"; ?>
