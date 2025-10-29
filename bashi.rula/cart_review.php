<?php
  $page_title = "Velorea — Cart Review";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<main class="container">
  <h2>Cart Review</h2>
  <table class="table">
    <thead>
      <tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>
    </thead>
    <tbody>
      <tr>
        <td>Lavender Calm</td>
        <td>1</td>
        <td>$18.00</td>
        <td>$18.00</td>
      </tr>
    </tbody>
    <tfoot>
      <tr><th colspan="3" class="text-right">Subtotal</th><th>$18.00</th></tr>
    </tfoot>
  </table>

   
  <div style="margin-top: 2em;">


  <button class="button" type="button" onclick="window.location.href='cart_checkout.php'">Proceed to Checkout</button>
  <button class="button button-secondary" type="button" onclick="window.location.href='blends.php'">Continue Shopping</button>
</div>

 

 

<?php include __DIR__ . "/parts/footer.php"; ?>
