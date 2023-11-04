export default class ProductView{
   #container;
   constructor(container){
      this.#container = container;
   }

   productComponent(product){
      console.log('entraproduct');
      return `
      <article class="col-xl-3 col-lg-3 col-md-4 ps-3">
         <h3>${product.name}</h3>
         <img src="${product.image}" alt="Imagen de ${product.name}">
         <p class="text-end">${product.price}</p>
      </article>
      `;
   }
   showProducts(productList = []){
      this.changeContainer();
      this.#container.innerHTML = "";
      productList.forEach(product => {
         this.#container.innerHTML += this.productComponent(product);
      });
   }
   changeContainer(){
      this.#container = document.getElementById('productContainer');
   }
   get container(){
      return this.#container;
   }
   set container(container){
      this.#container = container;
   }
}