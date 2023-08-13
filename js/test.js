import ProductsList from "./productsList.js";
//Patron IFFE test
(function () {
    let pl = new ProductsList();
    pl.generateProducts();
    let dataOutput = document.getElementsByClassName("dataoverhere")[0];
    dataOutput.innerHTML = "";
    console.log("Test del json");
    fetch("./data/data.json")
        .then((response) => response.json())
        .then((data) => 
        data.products.forEach(singleProduct => {
            dataOutput.innerHTML += `
            <div class=''>
                producto: ${singleProduct.product.name}
                id: ${singleProduct.product.id}
                provider: ${singleProduct.product.provider}
                price: ${singleProduct.product.price}
            </div>
            `
        }));
})();
