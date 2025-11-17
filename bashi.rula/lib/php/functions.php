<?php
// ---- SESSION & BASIC ----
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

function print_p($v) {
    echo "<pre>", print_r($v,true), "</pre>";
}

function file_get_json($filename) {
    $file = file_get_contents($filename);
    return json_decode($file);
}

/* ---- DATABASE FUNCTIONS ---- */
include __DIR__ . "/auth.php";

function makeConn() {
    list($host, $user, $pass, $database) = MYSQLIAuth();

    $conn = new mysqli($host, $user, $pass, $database);
    if($conn->connect_errno) die($conn->connect_error);

    $conn->set_charset('utf8');
    return $conn;
}

function makeQuery($conn, $qry) {
    $result = $conn->query($qry);
    if($conn->errno) die($conn->error);

    $a = [];
    while($row = $result->fetch_object()) {
        $a[] = $row;
    }
    return $a;
}

/* ---- CART (SESSION) ---- */

function getCart() {
    return $_SESSION['cart'] ?? [];
}

function saveCart($cart) {
    $_SESSION['cart'] = $cart;
}

function clearCart() {
    unset($_SESSION['cart']);
}


/* ==  AddToCart(). Product page sends the FINAL price (base OR +$5) == */
function addToCart($id, $name, $price, $weight = '40g', $image = '', $qty = 1) {
    $cart = getCart();
    $qty  = max(1, (int)$qty);

    // FINAL PRICE sent from the product page
    $price = (float)$price;

    // If same item (id + weight) exists → increase quantity
    foreach($cart as &$item) {
        if($item['id'] == $id && $item['weight'] === $weight) {
            $item['qty'] += $qty;
            saveCart($cart);
            return;
        }
    }

    // Otherwise create new cart entry
    $cart[] = [
        'id'     => (int)$id,
        'name'   => $name,
        'price'  => $price,    
        'qty'    => $qty,
        'weight' => $weight,
        'image'  => $image
    ];

    saveCart($cart);
}


/* ---- CART COUNT (for navbar badge) ---- */
function getCartCount() {
    $cart = getCart();
    $count = 0;
    foreach($cart as $item) {
        $count += (int)$item['qty'];
    }
    return $count;
}

/* ---- FLASH MESSAGES ---- */
function setFlash($msg) {
    $_SESSION['flash'] = $msg;
}

function getFlash() {
    if(!isset($_SESSION['flash'])) return '';
    $msg = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $msg;
}
?>
