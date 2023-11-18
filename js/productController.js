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
      })
      .catch(error => {
         console.error("Error: ",error)
      })
   }
   constructor(){
      // this.#ProductView = new ProductView();
      // this.#ProductModel = new ProductModel();
      this.onLoad();
   }
   
   onLoad(){
      this.#loadObjects();
   }
}