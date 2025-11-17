<?php 
require_once __DIR__ . "/../lib/php/functions.php";
$cart_count = getCartCount();
?>


<header class="navbar">
  <div class="container display-flex flex-align-center">
    <div class="flex-none">
      <h1>
        <a href="/aau/wnm608/bashi.rula/index.php" class="logo-link">Velorea</a>
      </h1>
    </div>

    <div class="flex-stretch"></div>

    <nav class="flex-none nav">
      <ul class="display-flex">
        <li><a href="/aau/wnm608/bashi.rula/index.php">Home</a></li>
        <li><a href="/aau/wnm608/bashi.rula/blends.php">Blends</a></li>
 
        <li><a href="/aau/wnm608/bashi.rula/cart_review.php">Cart Review</a></li>
        <li><a href="/aau/wnm608/bashi.rula/cart_checkout.php">Checkout</a></li>
        <li><a href="/aau/wnm608/bashi.rula/purchase_confirmation.php">Confirmation</a></li>

        <li>





          
          <a href="/aau/wnm608/bashi.rula/cart_review.php" class="cart-link" aria-label="Cart">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm0-2h13l1-7H6.42l-.94-2H1V5h3l3.6 7.59-1.35 2.44C6.16 15.37 6 15.68 6 16a2 2 0 0 0 1 1.73V16zm10 2c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2z"/>
            </svg>
            <?php if($cart_count > 0): ?>
            <span class="cart-badge"><?= $cart_count ?></span>
            <?php endif; ?>

          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>
