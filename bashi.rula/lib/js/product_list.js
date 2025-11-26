 

(async function(){

  let data = await fetch("data/api.php?type=products")
    .then(r => r.json());

  console.log("Loaded products:", data);

})();
