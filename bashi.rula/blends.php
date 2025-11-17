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

<section class="container">
  <h2>Luxury Wellness Blends</h2>
  <ul class="grid grid-4">

    <li class="card product">
      <a href="product_item.php?id=1"><img alt="Lavender Calm" src="images/p1.png">
      <h3>Lavender Calm</h3><p>Soft floral notes to relax body and mind.</p><div class="price">$18</div></a>

      <form method="post" action="product_item.php?id=1" style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=2"><img alt="Mint Focus" src="images/p2.png">
      <h3>Mint Focus</h3><p>Cool mint that refreshes and sharpens focus.</p><div class="price">$16</div></a>

      <form method="post" action="product_item.php?id=2" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=3"><img alt="Ginger Digest" src="images/p3.png">
      <h3>Ginger Digest</h3><p>Warm spice that supports calm digestion.</p><div class="price">$17</div></a>

      <form method="post" action="product_item.php?id=3" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=4"><img alt="Chamomile Dream" src="images/p4.png">
      <h3>Chamomile Dream</h3><p>Golden calm in a cup — your bedtime ritual begins here.</p><div class="price">$15</div></a>

      <form method="post" action="product_item.php?id=4" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=5"><img alt="Rose Harmony" src="images/p5.png">
      <h3>Rose Harmony</h3><p>Delicate rose for moments of inner peace.</p><div class="price">$19</div></a>

      <form method="post" action="product_item.php?id=5" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=6"><img alt="Citrus Glow" src="images/p6.png">
      <h3>Citrus Glow</h3><p>Zesty citrus that uplifts and energizes.</p><div class="price">$17</div></a>

      <form method="post" action="product_item.php?id=6" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=7"><img alt="Chai Tranquil" src="images/p7.png">
      <h3>Chai Tranquil</h3><p>Spiced warmth that comforts and grounds.</p><div class="price">$18</div></a>

      


      <form method="post" action="product_item.php?id=7" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=8"><img alt="Jasmine Muse" src="images/p8.png">
      <h3>Jasmine Muse</h3><p>Fragrant jasmine that inspires calm focus.</p><div class="price">$20</div></a>

      <form method="post" action="product_item.php?id=8" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
        <input type="hidden" name="add_to_cart" value="1">
        <input type="hidden" name="qty" value="1">
        <input type="hidden" name="weight" value="40g">
        <button class="button" type="submit">Add to Cart</button>
      </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=9"><img alt="Earl Grey Luxe" src="images/p9.png">
      <h3>Earl Grey Luxe</h3><p>Classic black tea with notes of bright bergamot.</p><div class="price">$19.50</div></a>

      <form method="post" action="product_item.php?id=9" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=10"><img alt="Moroccan Mint" src="images/p10.png">
      <h3>Moroccan Mint</h3><p>A timeless Moroccan blend of green tea and refreshing mint.</p><div class="price">$16.50</div></a>

      <form method="post" action="product_item.php?id=10" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=11"><img alt="Hibiscus Breeze" src="images/p11.png">
      <h3>Hibiscus Breeze</h3><p>Tart ruby hibiscus with a cooling floral finish.</p><div class="price">$15.50</div></a>

      <form method="post" action="product_item.php?id=11" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

    <li class="card product">
      <a href="product_item.php?id=12"><img alt="Turmeric Soothe" src="images/p12.png">
      <h3>Turmeric Soothe</h3><p>Golden turmeric with ginger for gentle warmth.</p><div class="price">$17.50</div></a>

      <form method="post" action="product_item.php?id=12" 
      style="display:flex; justify-content:center; gap:1em; margin-top:0.5em;">
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">
      <button class="button" type="submit">Add to Cart</button>
    </form>

    </li>

  </ul>
</section>

<?php include __DIR__ . "/parts/footer.php"; ?>
