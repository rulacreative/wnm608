/* -------------------------------
    BLENDS FILTERING LOGIC
-------------------------------- */

document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("search-input");
  const sortSelect  = document.getElementById("sort-select");
  const catSelect   = document.getElementById("category-select");
  const resetBtn    = document.getElementById("reset-btn");
  const productList = document.getElementById("product-list");

  if (!productList) return;

  const products = [...productList.querySelectorAll(".product")];

  function applyFilters() {
    const search = (searchInput?.value || "").toLowerCase().trim();
    const sort   = (sortSelect?.value || "newest");
    const cat    = (catSelect?.value || "all"); // already normalized in PHP

    let filtered = products.filter(p => {
      const name     = (p.dataset.name || "").toLowerCase();
      const desc     = (p.dataset.desc || "").toLowerCase();
      const category = p.dataset.cat || ""; // normalized slug from PHP

      const matchesSearch =
        !search || name.includes(search) || desc.includes(search);

      const matchesCat =
        cat === "all" || category === cat;

      return matchesSearch && matchesCat;
    });

    // SORTING
    filtered.sort((a, b) => {
      const pa = parseFloat(a.dataset.price);
      const pb = parseFloat(b.dataset.price);

      if (sort === "az")      return a.dataset.name.localeCompare(b.dataset.name);
      if (sort === "za")      return b.dataset.name.localeCompare(a.dataset.name);
      if (sort === "lowhigh") return pa - pb;
      if (sort === "highlow") return pb - pa;
      return 0; // "newest" = original order
    });

    // RENDER UPDATED LIST
    productList.innerHTML = "";
    filtered.forEach(p => productList.appendChild(p));
  }

  // EVENT LISTENERS
  if (searchInput) searchInput.addEventListener("input", applyFilters);
  if (sortSelect)  sortSelect.addEventListener("change", applyFilters);
  if (catSelect)   catSelect.addEventListener("change", applyFilters);

  if (resetBtn) {
    resetBtn.addEventListener("click", () => {
      if (searchInput) searchInput.value = "";
      if (sortSelect)  sortSelect.value  = "newest";
      if (catSelect)   catSelect.value   = "all";

      productList.innerHTML = "";
      products.forEach(p => productList.appendChild(p));
    });
  }
});
