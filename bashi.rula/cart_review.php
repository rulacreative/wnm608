<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";

/* -------- CART ACTIONS -------- */
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if($action === 'add') {
        addToCart(
            (int)$_POST['id'],
            $_POST['name'],
            (float)$_POST['price'],
            $_POST['weight'],
            $_POST['image'],
            max(1,(int)$_POST['qty'])
        );
        setFlash("{$_POST['name']} was added to your cart.");
        header("Location: cart_review.php"); exit;
    }

    if($action === 'update') {
        $cart = getCart();
        $i = (int)$_POST['index'];
        if(isset($cart[$i])) {
            $cart[$i]['qty'] = max(1,(int)$_POST['qty']);
            saveCart($cart);
        }
        header("Location: cart_review.php"); exit;
    }

    if($action === 'delete') {
        $cart = getCart();
        unset($cart[(int)$_POST['index']]);
        saveCart(array_values($cart));
        header("Location: cart_review.php"); exit;
    }
}

/* -------- DATA -------- */
$cart = getCart();
$flash = getFlash();
$subtotal = array_reduce($cart, fn($s,$i)=>$s+$i['price']*$i['qty'], 0);
$tax = $subtotal * 0.06;
$total = $subtotal + $tax;

include "parts/meta.php";
include "parts/navbar.php";
?>

<main class="container" style="max-width:900px;margin:auto;">
<h2 style="text-align:center;">Cart Review</h2>

<?php if($flash): ?>
<div class="alert alert-success"><?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<?php if(empty($cart)): ?>

<p style="text-align:center;">Your cart is empty.</p>
<div style="text-align:center;">
<button class="button" onclick="location.href='blends.php'">Continue Shopping</button>
</div>

<?php else: ?>



<!-- CART ITEMS -->
<div class="cart-list">

<?php foreach($cart as $i=>$item): ?>
<div class="cart-item">

<div class="cart-image">
<img src="images/<?= htmlspecialchars($item['image']) ?>" alt="">
</div>

<div class="cart-details">
<div class="cart-title-row">
<strong><?= htmlspecialchars($item['name']) ?></strong>
<form method="post">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="index" value="<?= $i ?>">
<button class="cart-remove">✕</button>
</form>
</div>

<div class="cart-meta"><?= htmlspecialchars($item['weight']) ?></div>
<div class="cart-price">$<?= number_format($item['price'],2) ?></div>

<form method="post" class="cart-qty">
<input type="hidden" name="action" value="update">
<input type="hidden" name="index" value="<?= $i ?>">
<select name="qty" onchange="this.form.submit()">
<?php for($q=1;$q<=10;$q++): ?>
<option value="<?= $q ?>" <?= $q==$item['qty']?'selected':'' ?>><?= $q ?></option>
<?php endfor; ?>
</select>
</form>
</div>

<div class="cart-line-total">
$<?= number_format($item['price']*$item['qty'],2) ?>
</div>

</div>
<?php endforeach; ?>

</div>

<!-- ORDER SUMMARY -->
<div class="cart-summary">
<div><span>Subtotal</span><span>$<?= number_format($subtotal,2) ?></span></div>
<div><span>Tax (6%)</span><span>$<?= number_format($tax,2) ?></span></div>
<div class="cart-grand">
<span>Grand Total</span>
<span>$<?= number_format($total,2) ?></span>
</div>
</div>

<div style="margin-top:2rem;">
<button class="button" onclick="location.href='cart_checkout.php'">Proceed to Checkout</button>
 
</div>

<?php endif; ?>
</main>

<?php include "parts/footer.php"; ?>
