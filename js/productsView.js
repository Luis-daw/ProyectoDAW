export default class ProductView{
   #container;
   constructor(container){
      this.#container = container;
   }

   productComponent(product){
      console.log('entraproduct');
      return `
      <article class="col-xl-4 col-lg-4 col-md-6 ps-1 product">
         <h3>${product.name}</h3>
         <img src="${product.image}" alt="Imagen de ${product.name}">
         <p class="text-end">${product.price}</p>
      </article>
      `;
   }
   showProducts(productList){
      this.changeContainer();
      this.#container.innerHTML = "";
      productList.forEach(product => {
         this.#container.innerHTML += this.productComponent(product.product);
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