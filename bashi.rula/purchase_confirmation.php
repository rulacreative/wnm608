<?php
  $page_title = "Velorea — Order Confirmed";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<main class="container">
  <div class="card soft text-center">
    <h2>Thank you!</h2>
    <p>Your purchase was successful. A confirmation email is on its way.</p>
    <p class="muted">Order #VLR-000123</p>
    <div class="display-flex justify-center gap">
      <a class="button" href="product_list.php">Continue Shopping</a>
      <a class="button button-secondary" href="index.php">Return Home</a>
    </div>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
