/* -------------------------------
    BLENDS FILTERING LOGIC
-------------------------------- */

document.addEventListener("DOMContentLoaded", () => {

  const searchInput   = document.getElementById("search-input");
  const sortSelect    = document.getElementById("sort-select");
  const catSelect     = document.getElementById("category-select");
  const resetBtn      = document.getElementById("reset-btn");
  const productList   = document.getElementById("product-list");
  const products      = [...productList.querySelectorAll(".product")];

  function applyFilters() {
    let search = searchInput.value.toLowerCase();
    let sort   = sortSelect.value;
    let cat    = catSelect.value;

    let filtered = products.filter(p => {
      let name = p.dataset.name.toLowerCase();
      let desc = p.dataset.desc.toLowerCase();
      let category = p.dataset.cat;
      return (
        (name.includes(search) || desc.includes(search)) &&
        (cat === "all" || category === cat)
      );
    });


    // Sort logic
    filtered.sort((a,b) => {
      let pa = parseFloat(a.dataset.price);
      let pb = parseFloat(b.dataset.price);

      if(sort === "az") return a.dataset.name.localeCompare(b.dataset.name);
      if(sort === "za") return b.dataset.name.localeCompare(a.dataset.name);
      if(sort === "lowhigh") return pa - pb;
      if(sort === "highlow") return pb - pa;

      return 0; // newest = original order
         });

    // Render updated list
    productList.innerHTML = "";
    filtered.forEach(p => productList.appendChild(p));
  }







  // Event listeners
  searchInput.addEventListener("input", applyFilters);
  sortSelect.addEventListener("change", applyFilters);
  catSelect.addEventListener("change", applyFilters);

  resetBtn.addEventListener("click", () => {
    searchInput.value = "";
    sortSelect.value = "newest";
    catSelect.value = "all";
    productList.innerHTML = "";
    products.forEach(p => productList.appendChild(p));
  });

});
