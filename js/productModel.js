import Product from "./product.js";
// export default class ProductModel{
   
//    constructor(){

//    }
// }


export let ProductModel = (function (){
   let instantiated;

   function init(){
      
      class ProductList{
         /*
         Estructura de datos:
         products:[
            {
               product: Product
               category: string
            }
         ]
         filteredProducts:[
            {
               product: Product
               category: string
            }
         ]
         */
         #products;
         #filteredProducts;

         //Métodos privados
         #checkRepeatedProducts(products){
            let notRepeatedProducts = [];
            products.forEach(product => {
               // Comprobar si el ID del nuevo producto ya existe en la lista de productos
               const isDuplicate = this.#products.some(existingProduct => existingProduct.product.id === product.product.id);
               if (!isDuplicate) {
                  notRepeatedProducts.push(product);
               }
           });
           return notRepeatedProducts;
         }
         constructor(){
            this.#products = [];
            this.#filteredProducts = [];
         }
         addProducts(products = null){
            console.log('entra addProducts');
            if (!Array.isArray(products)) {
               throw new Error('No llegan productos');
            }
            this.#products.push(...products);
         }
         filterProducts(category = null, minPrice, maxPrice){
            console.log('Entra filterProducts');
            this.#filteredProducts = [...this.#products];
            if (category) this.filterProductsCategory(category);
            if (maxPrice || minPrice) this.filterProductsPrice(minPrice, maxPrice)
         }
         filterProductsCategory(category){
            this.#filteredProducts = this.#filteredProducts.filter((product) => {
               console.log(product);
               return product.categories.some(cate => cate === category);
            })
         }
         filterProductsPrice(minPrice = Number.MIN_SAFE_INTEGER, maxPrice = Number.MAX_SAFE_INTEGER){
            console.log('Entra filterProductsPrice');
            this.#filteredProducts = this.#filteredProducts.filter((product) => {
               return product.product.price >= minPrice && product.product.price <= maxPrice;
            })
         }
         getFilteredProducts(){
            return this.#filteredProducts;
         }
         get products(){
            return this.#products;
         }
         get filteredProducts(){
            return this.#filteredProducts;
         }
      }

      let productList = new ProductList();
      Object.freeze(productList);
      return productList;
   }
   return {
      getInstance: function () {
          if (!instantiated) {
              instantiated = init();
          }
          return instantiated;
      }
  }
})();