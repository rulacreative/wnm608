<?php include "parts/meta.php"; ?>
<?php include "parts/navbar.php"; ?>

<div class="view-window" style="background-image:url('/aau/wnm608/bashi.rula/img/velora-store.png')">
  <div class="view-overlay">
    <h1>Relax. Refresh. Revive.</h1>
    <p>Luxury teas crafted for your mind, body, and soul.</p>
    <a href="blends.php" class="button">Shop Now</a>
  </div>
</div>

<section id="blends" class="container">
  <h2>Shop by Category</h2>
  <ul class="grid grid-3">
    <li class="card">

    <a href="blends.php">


     <img alt="Calming blends" src="img/face.png"><h3>Calming Blends</h3></a></li>
    <li class="card">    
      <a href="blends.php">


<img alt="Focus blends" src="img/body.png"><h3>Focus Blends</h3></a></li>
    <li class="card">
      <a href="blends.php"> 
      <img alt="Digestive blends" src="img/kits.png"><h3>Digestive Blends</h3></a></li>
  </ul>
</section>

<section id="discounts" class="promo-band">
  <p><strong>Autumn Offer:</strong> 20% off selective sets — code <code>FALL20</code> → <a href="index.php">Shop Discounts</a></p>
</section>

<section class="container">
  <h2>Featured Products</h2>
  <ul class="grid grid-4">
    <li class="card product">
      <a href="product_item.php"><img alt="Lavender Calm" src="img/p1.png"><h3>Lavender Calm</h3><p>Floral, soothing</p><div class="price">$18</div></a>
      <button class="button">Add to Cart</button>
    </li>
    <li class="card product">
      <a href="product_item.php"><img alt="Mint Focus" src="img/p2.png"><h3>Mint Focus</h3><p>Bright, refreshing</p><div class="price">$16</div></a>
      <button class="button">Add to Cart</button>
    </li>
    <li class="card product">
      <a href="product_item.php"><img alt="Ginger Digest" src="img/p3.png"><h3>Ginger Digest</h3><p>Warm, supportive</p><div class="price">$17</div></a>
      <button class="button">Add to Cart</button>
    </li>
    <li class="card product">
      <a href="product_item.php"><img alt="Chamomile Dream" src="img/p4.png"><h3>Chamomile Dream</h3><p>Soft, bedtime</p><div class="price">$15</div></a>
      <button class="button">Add to Cart</button>
    </li>
  </ul>
</section>

<section id="about-velorea" class="about-band">
  <div class="container">
    <h2>Why Velorea</h2>
    <p>
      Velorea was born from a love of stillness — of slowing down, of finding calm in simple, beautiful moments.
      Each blend we craft is a gentle reminder to breathe, pause, and reconnect with yourself.
    </p>
    <p>
      We source our ingredients with care, blend them with intention, and design every detail — from scent to texture —
      to turn your daily cup into a small act of luxury and mindfulness.
    </p>
    <a class="button button-secondary about-btn" href="index.php">Learn More</a>
  </div>
 

</section>

<section class="container newsletter" aria-labelledby="news-h">
  <h2 id="news-h">Join the Velorea Circle</h2>
  <form action="#" method="post">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" required placeholder="you@example.com">
    <button class="button" type="submit">Subscribe</button>
  </form>
</section>

<?php include "parts/footer.php"; ?>

<script>
  document.querySelectorAll("img").forEach(img => {
    const url = new URL(img.src, window.location.origin);
    url.searchParams.set("v", Date.now());
    img.src = url.toString();
  });
</script>
