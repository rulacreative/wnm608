 <?php
function productListTemplate($r, $o) {
  return $r . <<<HTML
  <div class="col-xs-12 col-md-3">
    <a href="product_item.php?id=$o->id" class="productlist">
      <figure class="figure product display-flex flex-column">
        <div class="flex-stretch">
          <img src="images/$o->thumbnail" alt="$o->name">
        </div>
        <figcaption class="flex-none" style="text-align:center;">
          <div class="h3" style="margin-top:0.5em;">$o->name</div>
          <div class="price">&dollar;$o->price</div>
        </figcaption>
      </figure>
    </a>
  </div>
  HTML;
}
?>
