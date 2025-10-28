<?php
  $page_title = "Velorea — Checkout";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<main class="container">
  <h2>Checkout</h2>

  <form class="grid grid-2 gap">
    <section class="card soft">
      <h3>Shipping Details</h3>
      <label>Full Name</label>
      <input type="text" required>
      <label>Address</label>
      <input type="text" required>
      <label>City</label>
      <input type="text" required>
      <label>ZIP</label>
      <input type="text" required>
    </section>

    <section class="card soft">
      <h3>Payment</h3>
      <label>Card Number</label>
      <input type="text" required>
      <label>Expiry</label>
      <input type="text" placeholder="MM/YY" required>
      <label>CVC</label>
      <input type="text" required>
    </section>
  </form>

  <div class="display-flex gap">
    <a class="button button-secondary" href="cart_review.php">Back to Cart</a>
    <a class="button" href="purchase_confirmation.php">Place Order</a>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
