<?php
include "../lib/php/functions.php";

$products = makeQuery(makeConn(), "SELECT * FROM `products` ORDER BY id ASC");


// ------------ Product List Template (with ID) ------------ //  
function productListTemplate($p) {
   return "
      <li class='product-item' data-name='".strtolower($p->name)."' data-id='{$p->id}'>
         <a href='/aau/wnm608/bashi.rula/admin/products.php?id=$p->id' class='productlist'>
            <strong>#{$p->id}</strong> — {$p->name} — \${$p->price}
         </a>
      </li>
   ";
}


// ----------------  Edit Product Form ----------------------------- //
function productEditForm($p) {

return <<<HTML
<nav class="nav nav-crumbs">
   <ul>
      <li><a href="/aau/wnm608/bashi.rula/admin/products.php">Back</a></li>
      <li><a href="/aau/wnm608/bashi.rula/admin/product_actions.php?duplicate=1&id={$p->id}">Duplicate This Item</a></li>
   </ul>
</nav>

<div class="card soft">
   <h2>Edit: {$p->name}</h2>

   <p style="margin-bottom:1em; color:#666;">Product ID: <strong>{$p->id}</strong></p>

   <form action="/aau/wnm608/bashi.rula/admin/product_actions.php" method="post" 
      onsubmit="return confirmDelete(event);">

      <input type="hidden" name="id" value="$p->id">

      <label class="form-label">Name</label>
      <input class="form-input" type="text" name="name" value="$p->name">

      <label class="form-label">Price</label>
      <input class="form-input" type="number" step="0.01" name="price" value="$p->price">

      <label class="form-label">URL Slug</label>
      <input class="form-input" type="text" name="url" value="$p->url">

      <label class="form-label">Category</label>
      <input class="form-input" type="text" name="category" value="$p->category">

      <label class="form-label">Description</label>
      <textarea class="form-input" name="description">$p->description</textarea>

      <label class="form-label">Thumbnail</label>
      <input class="form-input" type="text" name="thumbnail" value="$p->thumbnail">

      <label class="form-label">Images</label>
      <input class="form-input" type="text" name="images" value="$p->images">

      <br><br>

      <button class="button" type="submit" name="action" value="update">Save Changes</button>
      <button class="button-secondary delete-btn" type="submit" name="action" value="delete">Delete Product</button>

   </form>
	</div>
HTML;

}


// ---   // New Product Form // ------------- 
function productNewForm() {

	return <<<HTML
	<nav class="nav nav-crumbs">
	   <ul>
	      <li><a href="/aau/wnm608/bashi.rula/admin/products.php">Back</a></li>
	   </ul>
	</nav>



<div class="card soft">
   <h2>Add New Product</h2>

   <form action="/aau/wnm608/bashi.rula/admin/product_actions.php" method="post">


      <label class="form-label">Name</label>
      <input class="form-input" type="text" name="name">

      <label class="form-label">Price</label>
      <input class="form-input" type="number" step="0.01" name="price">

      <label class="form-label">URL Slug</label>
      <input class="form-input" type="text" name="url">

      <label class="form-label">Category</label>
      <input class="form-input" type="text" name="category">

      <label class="form-label">Description</label>
      <textarea class="form-input" name="description"></textarea>

      <label class="form-label">Thumbnail</label>
      <input class="form-input" type="text" name="thumbnail">

      <label class="form-label">Images</label>
      <input class="form-input" type="text" name="images">

      <br><br>

      <button class="button" type="submit" name="action" value="create">Add Product</button>

   </form>
</div>
HTML;

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Product Admin</title>
   <?php include "../parts/meta.php"; ?>
   <script>
      function confirmDelete(event){
         if(event.submitter && event.submitter.value === "delete"){
            return confirm("Are you sure you want to delete this product?");
         }
         return true;
      }
   </script>
   <style>




      /* ------------Search Bar ------------ */
      #admin-search {
         width: 100%;
         padding: 0.7em 1em;
         font-size: 1em;
         border: 1px solid #ccc;
         border-radius: 8px;
         margin-bottom: 1.5em;
      }
   </style>
</head>

<body>

<header class="navbar">
   <div class="container display-flex">
      <div class="flex-none"><h1>Admin Panel</h1></div>

      <div class="flex-stretch"></div>



		<nav class="nav nav-flex flex-none">
		   <ul>
		      <li><a href="/aau/wnm608/bashi.rula/index.php" target="_blank">Home</a></li>
		      <li><a href="/aau/wnm608/bashi.rula/admin/products.php">Products</a></li>
		      <li><a href="/aau/wnm608/bashi.rula/admin/users.php">Users</a></li>
		   </ul>
		</nav>




   </div>
</header>


<div class="container">

<?php






   // ------------ Edit page ------------//


   if(isset($_GET['id']) && $_GET['id'] != "new") {

      $p = makeQuery(makeConn(),
         "SELECT * FROM `products` WHERE `id` = {$_GET['id']}"
      )[0];

      echo productEditForm($p);

   // New product page
   } elseif(isset($_GET['id']) && $_GET['id'] == "new") {

      echo productNewForm();

  



   // ------------Product list page ------------ // 
   } else {
?>

      <div class="card soft">

         <input id="admin-search" type="text" placeholder="Search by name or product ID…">

         <div class="display-flex flex-justify-flex-end">
            <a href="/aau/wnm608/bashi.rula/admin/products.php?id=new" class="button">+ Add New Product</a>
         </div>

         <h2>Product List</h2>

         <ul id="admin-product-list" class="nav">
            <?= array_reduce($products, fn($c,$p)=>$c.productListTemplate($p)); ?>
         </ul>

      </div>

<?php } ?>

</div>

<script>











/* ------------ Admin Search (Name or ID) ------------ */
const searchInput = document.querySelector("#admin-search");
const items = document.querySelectorAll(".product-item");

searchInput.addEventListener("input", () => {
   const q = searchInput.value.toLowerCase().trim();

   items.forEach(item => {
      const name = item.dataset.name;
      const id   = item.dataset.id;

      if(name.includes(q) || id.includes(q)) {
         item.style.display = "block";
      } else {
         item.style.display = "none";
      }
   });
});
</script>

</body>
</html>
