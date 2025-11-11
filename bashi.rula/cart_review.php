<?php
  $page_title = "Velorea — Cart Review";
  include __DIR__ . "/parts/meta.php";
  include __DIR__ . "/parts/navbar.php";
?>

<main class="container" style="text-align:center;">
  <h2>Cart Review</h2>

  <table class="table" id="cart-table" style="margin:auto; text-align:center; width:80%;">
    <thead>
      <tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>
    </thead>
    <tbody></tbody>
    <tfoot>
      <tr><th colspan="3" style="text-align:right;">Subtotal</th><th id="subtotal">$0.00</th></tr>
      <tr><th colspan="3" style="text-align:right;">Tax (6%)</th><th id="tax">$0.00</th></tr>
      <tr><th colspan="3" style="text-align:right;">Grand Total</th><th id="grand-total">$0.00</th></tr>
    </tfoot>
  </table>

  <div style="margin-top: 2em;">
    <button class="button" type="button" onclick="window.location.href='cart_checkout.php'">Proceed to Checkout</button>
    <button class="button button-secondary" type="button" onclick="window.location.href='blends.php'">Continue Shopping</button>
  </div>
</main>

<?php include __DIR__ . "/parts/footer.php"; ?>

<script>
  // Load cart
  let cart = JSON.parse(localStorage.getItem("velorea_cart") || "[]");
  const tbody = document.querySelector("#cart-table tbody");
  const subtotalEl = document.querySelector("#subtotal");
  const taxEl = document.querySelector("#tax");
  const grandEl = document.querySelector("#grand-total");

  let subtotal = 0;
  tbody.innerHTML = "";

  if (cart.length === 0) {
    tbody.innerHTML = "<tr><td colspan='4' style='text-align:center;'>Your cart is empty.</td></tr>";
  } else {
    cart.forEach((item, index) => {
      const total = (item.price * item.qty).toFixed(2);
      subtotal += parseFloat(total);

      let options = "";
      for (let i = 1; i <= 10; i++) {
        options += `<option value="${i}" ${i === item.qty ? "selected" : ""}>${i}</option>`;
      }

      // add thumbnail  
      const thumb = item.thumbnail || item.images || `p${item.id}.png`;

      tbody.innerHTML += `
        <tr>
          <td style="display:flex; align-items:center; gap:1em; justify-content:center;">
            <img src="images/${thumb}" alt="${item.name}" style="width:60px; height:auto; border-radius:6px;">
            <span>${item.name}</span>
          </td>
          <td>
            <select class="qty-select" data-index="${index}">
              ${options}
            </select>
          </td>
          <td>$${item.price.toFixed(2)}</td>
          <td class="item-total">$${total}</td>
        </tr>
      `;
    });

    updateTotals();
  }

  // Quantity updates  
  document.addEventListener("change", e => {
    if (!e.target.classList.contains("qty-select")) return;
    const index = e.target.dataset.index;
    const newQty = parseInt(e.target.value);
    cart[index].qty = newQty;
    localStorage.setItem("velorea_cart", JSON.stringify(cart));
    const newTotal = (cart[index].price * newQty).toFixed(2);
    e.target.closest("tr").querySelector(".item-total").textContent = `$${newTotal}`;
    updateTotals();
  });

  // Recalculate the cost and calculate the totals
  function updateTotals() {
    const newSubtotal = cart.reduce((sum, i) => sum + i.price * i.qty, 0);
    const tax = newSubtotal * 0.06;
    const grand = newSubtotal + tax;

    subtotalEl.textContent = `$${newSubtotal.toFixed(2)}`;
    taxEl.textContent = `$${tax.toFixed(2)}`;
    grandEl.textContent = `$${grand.toFixed(2)}`;
  }
</script>
