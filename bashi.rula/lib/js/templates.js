 
const makeProductList = templater(o => `
  <div class="product-item">
    <img src="${o.thumbnail}" alt="${o.name}">
    <h3>${o.name}</h3>
    <p>${o.description}</p>
    <div class="price">$${o.price}</div>
  </div>
`);
