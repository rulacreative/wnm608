<?php include "parts/meta.php"; ?>
<?php include "parts/navbar.php"; ?>

<!-- HERO SECTION -->
<div class="view-window" style="background-image:url('images/velora-store.png')">
  <div class="view-overlay">
    <h1>Relax. Refresh. Revive.</h1>
    <p>Luxury teas crafted for your mind, body, and soul.</p>
    <a href="blends.php" class="button">Shop Now</a>
  </div>
</div>

<!-- SHOP BY CATEGORY -->
<section id="blends" class="container">
  <h2>Shop by Category</h2>

  <ul class="grid grid-3">

    <!-- CATEGORY 1 -->
    <li class="card">
      <a href="blends.php">
        <img alt="Calming Blends" src="images/face.png">
        <h3>Calming Blends</h3>
      </a>
    </li>

    <!-- CATEGORY 2 -->
    <li class="card">
      <a href="blends.php">
        <img alt="Focus Blends" src="images/body.png">
        <h3>Focus Blends</h3>
      </a>
    </li>

    <!-- CATEGORY 3 -->
    <li class="card">
      <a href="blends.php">
        <img alt="Digestive Blends" src="images/kits.png">
        <h3>Digestive Blends</h3>
      </a>
    </li>

  </ul>
</section>

<!-- PROMO BAND -->
<section id="discounts" class="promo-band">
  <p><strong>Autumn Offer:</strong> 20% off selective sets — code 
    <code>FALL20</code> → <a href="index.php">Shop Discounts</a>
  </p>
</section>

<!-- FEATURED PRODUCTS -->






<section class="container">
  <h2>Featured Products</h2>

<?php
// Load newest 4 products from the database
$featured = makeQuery(makeConn(), "
    SELECT * FROM products ORDER BY id ASC LIMIT 4
");
?>

<ul class="grid grid-4">
<?php foreach($featured as $p) : ?>
    <li class="card product">
        <a href="product_item.php?id=<?= $p->id ?>">
            <img alt="<?= $p->name ?>" src="images/<?= $p->thumbnail ?>">
            <h3><?= $p->name ?></h3>
            <p><?= $p->description ?></p>
            <div class="price">$<?= $p->price ?></div>
        </a>

        <form method="post" action="product_item.php?id=<?= $p->id ?>"
            style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
            <input type="hidden" name="add_to_cart" value="1">
            <input type="hidden" name="qty" value="1">
            <input type="hidden" name="weight" value="40g">
            <button class="button" type="submit">Add to Cart</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>











<!-- ABOUT SECTION -->
<section id="about-velorea" class="about-band">
  <div class="container">
    <h2>Why Velorea</h2>
    <p>
      Velorea was born from a love of stillness — of slowing down, of finding calm in simple, beautiful moments.
      Each blend we craft is a gentle reminder to breathe, pause, and reconnect with yourself.
    </p>
    <p>
      We source our ingredients with care, blend them with intention, and design every detail —
      from scent to texture — to turn your daily cup into a small act of luxury and mindfulness.
    </p>
    <a class="button button-secondary about-btn" href="about.php">Learn More</a>
  </div>
</section>

<!-- NEWSLETTER -->
<section class="container newsletter" aria-labelledby="news-h">
  <h2 id="news-h">Join the Velorea Circle</h2>

  <form action="#" method="post">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" required placeholder="you@example.com">
    <button class="button" type="submit">Subscribe</button>
  </form>
</section>

<?php include "parts/footer.php"; ?>
