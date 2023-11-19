import ProductView from "./productsView.js";
import {ProductModel} from "./productModel.js";

export default class ProductController  {

   #ProductView;
   #ProductModel;
   #loadObjects = function (){
      fetch ("../data/products.json")
      .then(response => {
         console.log(response);
         return response.json();
      })
      .then(data => {
         console.log(data);
         console.log(this.#ProductModel.addProducts(data));
      })
      .catch(error => {
         console.error("Error: ",error)
      })
   }
   constructor(){
      this.#ProductView = new ProductView();
      this.#ProductModel = ProductModel.getInstance();
      this.select = document.getElementById('categoriesSelect');
      this.onLoad();
   }
   
   onLoad(){
      this.#loadObjects();
      this.select.addEventListener('change', (event) => {
         this.#ProductModel.filterProducts(event.target.value);
         console.log(this.#ProductModel.products)
         console.log(this.#ProductModel.filteredProducts)
      });
   }
}