<?php
include_once "lib/php/functions.php";

/* ---- CART ACTIONS ---- */
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';

  if($action === 'add') {
    $id     = (int)($_POST['id'] ?? 0);
    $name   = $_POST['name']  ?? '';
    $price  = (float)($_POST['price'] ?? 0);   // ←  THE FINAL PRICE (with +$5 included)
    $image  = $_POST['image'] ?? '';
    $weight = $_POST['weight'] ?? 'Standard';
    $qty    = max(1, (int)($_POST['qty'] ?? 1));

    //  PRICE SENT FROM PRODUCT PAGE
    addToCart($id, $name, $price, $weight, $image, $qty);

    setFlash("$name was added to your cart.");
    header("Location: cart_review.php");
    exit;
  }

  if($action === 'update') {
    $index = (int)($_POST['index'] ?? -1);
    $qty   = max(1, (int)($_POST['qty'] ?? 1));
    $cart  = getCart();
    if(isset($cart[$index])) {
      $cart[$index]['qty'] = $qty;
      saveCart($cart);
      setFlash("Cart updated.");
    }
    header("Location: cart_review.php");
    exit;
  }

  if($action === 'delete') {
    $index = (int)($_POST['index'] ?? -1);
    $cart  = getCart();
    if(isset($cart[$index])) {
      unset($cart[$index]);
      $cart = array_values($cart);
      saveCart($cart);
      setFlash("Item removed from cart.");
    }
    header("Location: cart_review.php");
    exit;
  }
}

/* ---- VIEW DATA ---- */
$cart        = getCart();
$cart_count  = getCartCount();
$flash       = getFlash();
$subtotal    = 0;
$tax_rate    = 0.06;

// NO PRICE CHANGES  
foreach($cart as $item) {
  $subtotal += $item['price'] * $item['qty'];
}

$tax   = $subtotal * $tax_rate;
$total = $subtotal + $tax;

$page_title = "Velorea — Cart Review";
include __DIR__ . "/parts/meta.php";
include __DIR__ . "/parts/navbar.php";
?>

<main class="container" style="text-align:center;">
  <h2>Cart Review</h2>

  <?php if($flash): ?>
    <div class="alert alert-success"><?= htmlspecialchars($flash) ?></div>
  <?php endif; ?>

  <table class="table" id="cart-table" style="margin:auto; text-align:center; width:80%;">
    <thead>
      <tr>
        <th>Product</th>
        <th>Qty</th>
        <th>Total</th>
      </tr>
    </thead>

    <tbody>
      <?php if(empty($cart)): ?>
        <tr>
          <td colspan="3" style="text-align:center;">Your cart is empty.</td>
        </tr>
      <?php else: ?>
        <?php foreach($cart as $i => $item): ?>
          <tr>
            <!-- PRODUCT CELL -->
            <td>
              <div style="display:flex; align-items:start; gap:1em;">

                <!-- Thumbnail -->
                <div style="width:80px; height:80px; overflow:hidden; border-radius:6px; flex-shrink:0;">
                  <?php if(!empty($item['image'])): ?>
                    <img src="images/<?= htmlspecialchars($item['image']) ?>"
                         alt="<?= htmlspecialchars($item['name']) ?>"
                         style="width:100%; height:100%; object-fit:cover;">
                  <?php else: ?>
                    <div style="width:100%; height:100%; background:#eee;"></div>
                  <?php endif; ?>
                </div>

                <!-- Text block -->
                <div style="text-align:left; line-height:1.3;">

                  <!-- Name + remove -->
                  <div style="display:flex; align-items:center; gap:0.5em;">
                    <span style="font-weight:600;"><?= htmlspecialchars($item['name']) ?></span>

                    <!-- Remove icon -->
                    <form method="post" action="cart_review.php" style="display:inline;">
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="index" value="<?= $i ?>">
                      <button type="submit"
                              style="border:none; background:none; font-size:1.2em; cursor:pointer; color:#A78BBE;">
                        ✕
                      </button>
                    </form>
                  </div>

                  <!-- Weight -->
                  <div style="color:#888; font-size:0.9em;">
                    <?= htmlspecialchars($item['weight']) ?>
                  </div>

                  <!-- Unit price -->
                  <div style="color:#777; font-size:0.85em;">
                    $<?= number_format($item['price'], 2) ?>
                  </div>

                </div>
              </div>
            </td>

            <!-- QUANTITY -->
            <td>
              <form method="post" action="cart_review.php" style="display:inline;">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="index" value="<?= $i ?>">
                <select name="qty" onchange="this.form.submit()">
                  <?php for($q=1; $q<=10; $q++): ?>
                    <option value="<?= $q ?>" <?= $q == $item['qty'] ? 'selected' : '' ?>>
                      <?= $q ?>
                    </option>
                  <?php endfor; ?>
                </select>
              </form>
            </td>

            <!-- LINE TOTAL -->
            <td>
              $<?= number_format($item['price'] * $item['qty'], 2) ?>
            </td>

          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>

    <tfoot>
      <!-- Separation Line -->
      <tr>
        <td colspan="3">
          <hr style="border:0; border-top:1px solid #ddd; margin:1.5em 0;">
        </td>
      </tr>

      <tr>
        <th></th>
        <th style="text-align:right;">Subtotal</th>
        <th id="subtotal">$<?= number_format($subtotal, 2) ?></th>
      </tr>

      <tr>
        <th></th>
        <th style="text-align:right;">Tax (6%)</th>
        <th id="tax">$<?= number_format($tax, 2) ?></th>
      </tr>

      <tr>
        <th></th>
        <th style="text-align:right;">Grand Total</th>
        <th id="grand-total">$<?= number_format($total, 2) ?></th>
      </tr>
    </tfoot>

  </table>

  <div style="margin-top: 2em;">
    <button class="button" type="button" onclick="window.location.href='cart_checkout.php'">Proceed to Checkout</button>
    <button class="button button-secondary" type="button" onclick="window.location.href='blends.php'">Continue Shopping</button>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>
