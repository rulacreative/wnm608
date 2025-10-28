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

  <div class="display-flex gap">
    <a class="button button-secondary" href="product_list.php">Continue Shopping</a>
    <a class="button" href="cart_checkout.php">Proceed to Checkout</a>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
