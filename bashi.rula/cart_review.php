<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";

/* ---- CART ACTIONS ---- */
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if($action === 'add') {
        $id     = (int)($_POST['id'] ?? 0);
        $name   = $_POST['name']  ?? '';
        $price  = (float)($_POST['price'] ?? 0);
        $image  = $_POST['image'] ?? '';
        $weight = $_POST['weight'] ?? 'Standard';
        $qty    = max(1, (int)($_POST['qty'] ?? 1));

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

foreach($cart as $item) {
    $subtotal += $item['price'] * $item['qty'];
}

$tax   = $subtotal * $tax_rate;
$total = $subtotal + $tax;

$page_title = "Velorea — Cart Review";
include __DIR__ . "/parts/meta.php";
include __DIR__ . "/parts/navbar.php";
?>

<main class="container" style="text-align:center; max-width:900px; margin:auto;">
    <h2>Cart Review</h2>

    <?php if($flash): ?>
        <div class="alert alert-success"><?= htmlspecialchars($flash) ?></div>
    <?php endif; ?>

    <?php if(empty($cart)): ?>

        <!-- EMPTY CART VIEW -->
        <p style="margin-top:2em; font-size:1.2rem; color:#666;">
            Your cart is empty.
        </p>

        <button class="button" 
                onclick="window.location.href='blends.php'"
                style="margin-top:1em;">
            Continue Shopping
        </button>

    <?php else: ?>

        <!-- CART TABLE -->
        <table class="table" id="cart-table" style="margin:2em auto; text-align:center; width:80%;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($cart as $i => $item): ?>
                    <tr>
                        <td>
                            <div style="display:flex; align-items:start; gap:1em;">

                                <div style="width:80px; height:80px; overflow:hidden; border-radius:6px; flex-shrink:0;">
                                    <img src="images/<?= htmlspecialchars($item['image']) ?>"
                                         alt="<?= htmlspecialchars($item['name']) ?>"
                                         style="width:100%; height:100%; object-fit:cover;">
                                </div>

                                <div style="text-align:left;">
                                    <div style="display:flex; align-items:center; gap:0.5em;">
                                        <strong><?= htmlspecialchars($item['name']) ?></strong>

                                        <form method="post" action="cart_review.php">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="index" value="<?= $i ?>">
                                            <button type="submit"
                                                style="border:none; background:none; font-size:1.2em; cursor:pointer; color:#A78BBE;">
                                                ✕
                                            </button>
                                        </form>
                                    </div>

                                    <div style="color:#888; font-size:0.9em;"><?= $item['weight'] ?></div>
                                    <div style="color:#777;">$<?= number_format($item['price'],2) ?></div>
                                </div>

                            </div>
                        </td>

                        <td>
                            <form method="post" action="cart_review.php">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="index" value="<?= $i ?>">
                                <select name="qty" onchange="this.form.submit()">
                                    <?php for($q=1; $q<=10; $q++): ?>
                                        <option value="<?= $q ?>" <?= $q==$item['qty']?'selected':'' ?>>
                                            <?= $q ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </form>
                        </td>

                        <td>$<?= number_format($item['price'] * $item['qty'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr><td colspan="3"><hr></td></tr>

                <tr>
                    <td></td>
                    <th style="text-align:right;">Subtotal</th>
                    <th>$<?= number_format($subtotal, 2) ?></th>
                </tr>

                <tr>
                    <td></td>
                    <th style="text-align:right;">Tax (6%)</th>
                    <th>$<?= number_format($tax, 2) ?></th>
                </tr>

                <tr>
                    <td></td>
                    <th style="text-align:right;">Grand Total</th>
                    <th>$<?= number_format($total, 2) ?></th>
                </tr>
            </tfoot>
        </table>

        <div style="margin-top: 2em;">
            <button class="button" onclick="window.location.href='cart_checkout.php'">Proceed to Checkout</button>
            <button class="button button-secondary" onclick="window.location.href='blends.php'">Continue Shopping</button>
        </div>

    <?php endif; ?>
</main>

<!--  SUGGESTIONs   -->
<section class="container" style="margin-top:4rem; margin-bottom:4rem;">
    <h3 style="font-family:var(--font-serif); text-align:center;">
        You may also like
    </h3>

 

    <ul class="grid grid-4" style="padding:0;">
        <?php 
            $result = makeQuery(makeConn(), "SELECT * FROM products ORDER BY RAND() LIMIT 4");
            echo array_reduce($result, "productListTemplate");
        ?>
    </ul>
</section>

<?php include __DIR__ . "/parts/footer.php"; ?>
