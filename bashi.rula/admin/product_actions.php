<?php
include "../lib/php/functions.php";

$conn = makeConn();

/* 
   Utility for INSERT / UPDATE / DELETE.
   Avoids the fetch_object() crash you were getting.
*/
function runNonQuery($conn, $qry) {
    if(!$conn->query($qry)) {
        die("DB Error: " . $conn->error);
    }
}



/* ------------------------------------------------------------
   DUPLICATE (GET REQUEST)
------------------------------------------------------------ */
if(isset($_GET['duplicate']) && isset($_GET['id'])) {

    $id = intval($_GET['id']);
    $check = makeQuery($conn, "SELECT * FROM products WHERE id=$id");

    if(count($check) === 0) {
        die("Product not found.");
    }

    $p = $check[0];

    $qry = "
        INSERT INTO products
        (name, price, url, description, category, images, thumbnail)
        VALUES
        (
            '{$p->name} (Copy)',
            '{$p->price}',
            '{$p->url}',
            '{$p->description}',
            '{$p->category}',
            '{$p->images}',
            '{$p->thumbnail}'
        )
    ";

    runNonQuery($conn, $qry);

    header("Location: /aau/wnm608/bashi.rula/admin/products.php?status=duplicate");
    exit;
}



/* ------------------------------------------------------------
   HANDLE FORM ACTIONS (POST)
------------------------------------------------------------ */
$action = $_POST['action'] ?? "";
$type = "";


switch($action) {

    /* CREATE */
    case "create":
        $qry = "
            INSERT INTO products
            (name, price, url, description, category, images, thumbnail)
            VALUES
            (
                '{$_POST['name']}',
                '{$_POST['price']}',
                '{$_POST['url']}',
                '{$_POST['description']}',
                '{$_POST['category']}',
                '{$_POST['images']}',
                '{$_POST['thumbnail']}'
            )
        ";
        runNonQuery($conn, $qry);
        $type = "add";
        break;


    /* UPDATE */
    case "update":
        $id = intval($_POST['id']);
        $qry = "
            UPDATE products
            SET
                name='{$_POST['name']}',
                price='{$_POST['price']}',
                url='{$_POST['url']}',
                description='{$_POST['description']}',
                category='{$_POST['category']}',
                images='{$_POST['images']}',
                thumbnail='{$_POST['thumbnail']}'
            WHERE id=$id
        ";
        runNonQuery($conn, $qry);
        $type = "edit";
        break;


    /* DELETE */
    case "delete":
        $id = intval($_POST['id']);
        $qry = "DELETE FROM products WHERE id=$id";
        runNonQuery($conn, $qry);
        $type = "delete";
        break;
}


/* ------------------------------------------------------------
   REDIRECT BACK
------------------------------------------------------------ */
header("Location: /aau/wnm608/bashi.rula/admin/products.php?status=$type");
exit;
?>
