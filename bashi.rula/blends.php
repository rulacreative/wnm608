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
  </div>
</div>



<!-- SEARCH + FILTERS BAR -->
<section class="container" style="margin-top:2em;">
  <div class="flex-center" style="display:flex; gap:1em; align-items:center; flex-wrap:wrap;">

    <input
      id="search-input"
      type="text"
      placeholder="Search blends…"
      style="flex:1; padding:1em; border-radius:8px; border:1px solid #ccc; font-size:1.1em;">

    <select
      id="sort-select"
      style="padding:1em; border-radius:8px; border:1px solid #ccc; font-size:1.1em;">
      <option value="newest">Sort By: Newest</option>
      <option value="az">A–Z</option>
      <option value="za">Z–A</option>
      <option value="lowhigh">Price: Low → High</option>
      <option value="highlow">Price: High → Low</option>
    </select>


    <select
      id="category-select"
      style="padding:1em; border-radius:8px; border:1px solid #ccc; font-size:1.1em;">
      <option value="all">All Categories</option>
      <option value="herbal">Herbal</option>
      <option value="wellness">Wellness</option>
      <option value="floral">Floral</option>
      <option value="citrus">Citrus</option>
      <option value="chai">Chai</option>
      <option value="green">Green</option>
      <option value="black">Black</option>
    </select>

    <button
      id="reset-btn"
      style="
        padding:1em 2em;
        border-radius:50px;
        background:#b99bd9;
        color:white;
        font-size:1em;
        border: 2px solid var(--color-main-dark);
        cursor: pointer;
        text-decoration: none;
        transition: background 0.3s ease;
      ">
      Reset
    </button>

  </div>
</section>

<section class="container">
  <h2>Luxury Wellness Blends</h2>

  <ul id="product-list" class="grid grid-4">
    <?php
     


     $category = $_GET['category'] ?? null;

        $filter_map = [
          "Calming Blends" => ["Lavender Calm", "Chamomile Dream"],
          "Focus Blends"   => ["Mint Focus"],
          "Digestive Blends" => ["Ginger Digest"]
        ];

        if ($category && isset($filter_map[$category])) {




 // Create SQL IN list
            $names = $filter_map[$category];
            $names_in = "'" . implode("','", $names) . "'";
            $query = "SELECT * FROM products WHERE name IN ($names_in)";
        } else {


// Default: show all products
            $query = "SELECT * FROM products ORDER BY id ASC";
        }

        $products = makeQuery(makeConn(), $query);

 

      foreach($products as $p) {



// Normalize safely for HTML & JS
        $name      = htmlspecialchars($p->name, ENT_QUOTES);
        $desc      = htmlspecialchars($p->description, ENT_QUOTES);
        $price_raw = (float)$p->price;



// SIMPLE DISCOUNT: apply 20% off when ?discount=1
          if (isset($_GET['discount']) && $_GET['discount'] == 1) {
              $price_raw = $price_raw * 0.80;  // apply 20% discount
          }

          $price = number_format($price_raw, 2);

        $thumb     = htmlspecialchars($p->thumbnail, ENT_QUOTES);




// SLUGGED CATEGORY: to removes spaces/case issues from DB
        $cat_slug  = strtolower(trim($p->category));

        echo "
          <li class='card product'
            data-name=\"{$name}\"
            data-desc=\"{$desc}\"
            data-price=\"{$price_raw}\"
            data-cat=\"{$cat_slug}\">

            <a href='product_item.php?id={$p->id}'>
              <img alt=\"{$name}\" src='images/{$thumb}'>
              <h3>{$name}</h3>
              <p>{$desc}</p>
              <div class='price'>\${$price}</div>
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
