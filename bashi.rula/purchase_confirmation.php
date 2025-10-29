<?php
  $page_title = "Velorea — Order Confirmed";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<main class="container">
  <div class="card soft text-center" style="text-align:center;">
    <h2>Thank you!</h2>
    <p>Your purchase was successful. A confirmation email is on its way.</p>
    <p class="muted">Order #VLR-000123</p>
    <div class="display-flex gap" style="justify-content:center;">

      

      <button class="button" type="button" onclick="window.location.href='blends.php'">  Continue Shopping
      </button>
 
      




    </div>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
