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
            if (!Array.isArray(products)) {
               throw new Error('No llegan productos');
            }
            this.#products.push(...products);
         }
         getAllProducts(){
            return this.#products;
         }
         getFilteredProducts(){
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
})