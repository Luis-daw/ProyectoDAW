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
         return response.json();
      })
      .then(data => {
         console.log(...data);
         this.#ProductModel.addProducts(data);
         this.#ProductView.showProducts(this.#ProductModel.products);

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
      console.log('filter');
      console.log(this.filter);
      this.max = document.getElementById('max');
      this.min = document.getElementById('min');
      this.onLoad();
   }
   
   onLoad(){
      this.#loadObjects();
      this.bindCategoriesEvent();
      this.bindFilterEvent();
   }
   bindCategoriesEvent(){
      console.log('Entra categorias');
      this.select.addEventListener('change', (event) => {
         this.#ProductModel.filterProducts(event.target.value, this.min.value, this.max.value);
         this.#ProductView.showProducts(this.#ProductModel.filteredProducts);
      });
   }
   bindFilterEvent(){
      this.filter.addEventListener('click', (event) => {
         console.log("Ejecuta boton");
         this.#ProductModel.filterProducts(this.select.value, this.min.value, this.max.value);
         this.#ProductView.showProducts(this.#ProductModel.filteredProducts);
      });
   }
}