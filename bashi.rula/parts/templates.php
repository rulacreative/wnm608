<?php
function productListTemplate($r, $o) {
  return $r . <<<HTML
  <li class="card product"
      style="list-style:none; text-align:center; padding:1em;">

    <a href="product_item.php?id=$o->id" style="text-decoration:none; color:inherit;">
      <img src="images/$o->thumbnail" alt="$o->name" 
           style="width:100%; border-radius:6px;">

      <h3 style="margin:0.5em 0;">$o->name</h3>
      <p style="font-size:0.9em; color:#666;">$o->description</p>

      <div class="price" style="margin-top:0.5em;">&dollar;$o->price</div>
    </a>

    <form method="post" action="product_item.php?id=$o->id"
      style="display:flex; justify-content:center; margin-top:0.75em;">
      
      <input type="hidden" name="add_to_cart" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="weight" value="40g">

      <button class="button" type="submit">Add to Cart</button>
    </form>
  </li>
HTML;
}
?>
