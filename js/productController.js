import ProductView from "./productsView.js";
import {ProductModel} from "./productModel.js";

export default class ProductController  {

   #ProductView;
   #ProductModel;
   select;
   filter;
   max;
   min;
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
      this.filter = document.getElementById('filter');
      this.max = document.getElementById('max');
      this.min = document.getElementById('min');
      this.onLoad();
   }
   
   onLoad(){
      console.log('onload');
      this.#loadObjects();
      this.bindCategoriesEvent();
      this.bindFilterEvent();
   }
   bindCategoriesEvent(){
      console.log('Entra categorias');
      this.select.addEventListener('change', (event) => {
         console.log(this.max.value);
         console.log(this.min.value);
         this.#ProductModel.filterProducts(event.target.value, this.min.value, this.max.value);
         // this.#ProductView.showProducts(this.#ProductModel.products);
         console.log(this.#ProductModel.filteredProducts);
      });
   }
   bindFilterEvent(){
      this.filter.addEventListener('change', (event) => {
         this.#ProductModel.filterProducts(event.target.value);
         console.log(this.#ProductModel.products);
         console.log(this.#ProductModel.filteredProducts);
      });
   }
}