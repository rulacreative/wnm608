<?php
 
  $page_title = "Velorea — Our Signature Tea Blends";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<div class="view-window" style="background-image:url('img/teablends-hero.png')">
  <div class="view-overlay">
    <h1>Our Signature Blends</h1>
    <p>Discover Velorea’s artisan tea collection — each crafted to awaken the senses and restore balance.</p>
  </div>
</div>

<section class="container">
  <h2>Luxury Wellness Blends</h2>
  <ul class="grid grid-4">
    <li class="card product">
      <a href="product_item.php"><img alt="Lavender Calm" src="img/p1.png"><h3>Lavender Calm</h3><p>Soft floral notes to relax body and mind.</p><div class="price">$18</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    
  </div>
      
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Mint Focus" src="img/p2.png"><h3>Mint Focus</h3><p>Cool mint that refreshes and sharpens focus.</p><div class="price">$16</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Ginger Digest" src="img/p3.png"><h3>Ginger Digest</h3><p>Warm spice that supports calm digestion.</p><div class="price">$17</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Chamomile Dream" src="img/p4.png"><h3>Chamomile Dream</h3><p>Golden calm in a cup — your bedtime ritual begins here.</p><div class="price">$15</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Rose Harmony" src="img/p5.png"><h3>Rose Harmony</h3><p>Delicate rose for moments of inner peace.</p><div class="price">$19</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Citrus Glow" src="img/p6.png"><h3>Citrus Glow</h3><p>Zesty citrus that uplifts and energizes.</p><div class="price">$17</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Chai Tranquil" src="img/p7.png"><h3>Chai Tranquil</h3><p>Spiced warmth that comforts and grounds.</p><div class="price">$18</div></a>
      <div style="display:flex; justify-content:center; gap:1em;">
    <button class="button" type="button" onclick="window.location.href='cart_review.php'">Add to Cart</button>
    </li>

    <li class="card product">
      <a href="product_item.php"><img alt="Jasmine Muse" src="img/p8.png"><h3>Jasmine Muse</h3><p>Fragrant jasmine that inspires calm focus.</p><div class="price">$20</div></a>
        <button class="button add-to-cart">Add to Cart</button>

    </li>
  </ul>
</section>

<?php include __DIR__ . "/parts/footer.php"; ?>











<script>
  // Keep the cache-busting for images
  document.querySelectorAll("img").forEach(img => {
    const url = new URL(img.src, window.location.origin);
    url.searchParams.set("v", Date.now());
    img.src = url.toString();
  });

  // Simple cart using localStorage
  document.querySelectorAll(".add-to-cart").forEach(button => {
    button.addEventListener("click", () => {
      const card = button.closest("li");

      const name  = card.querySelector("h3")?.textContent.trim() || "Unknown Item";
      const priceText = card.querySelector(".price")?.textContent.replace("$", "").trim() || "0";
      const price = parseFloat(priceText) || 0;

      //  existing cart or start a new one
      const cart = JSON.parse(localStorage.getItem("velorea_cart") || "[]");

      // This is to check if item already in cart
      const existing = cart.find(item => item.name === name);
      if (existing) {
        existing.qty += 1;
      } else {
        cart.push({ name, price, qty: 1 });
      }

      localStorage.setItem("velorea_cart", JSON.stringify(cart));

      // To go to Cart Review page
      window.location.href = "cart_review.php";
    });
  });
</script>





