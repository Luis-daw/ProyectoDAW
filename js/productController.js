import ProductView from "./productsView.js";
import ProductModel from "./productModel.js";

export class productController  {

   #ProductView;
   #ProductModel;
   constructor(){
      this.#ProductView = new ProductView();
      this.#ProductModel = new ProductModel();
      this.onLoad();
   }
   
   onLoad(){

   }
}