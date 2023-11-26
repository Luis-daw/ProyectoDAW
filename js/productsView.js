export default class ProductView{
   #container;
   constructor(container){
      this.#container = container;
   }

   productComponent(product){
      console.log(product);
      return `
         <article class="col-xl-4 col-lg-4 col-md-6 ps-1 product">
            <a href='./product/?product=${product.name}'>
               <h3>${product.name}</h3>
               <div class='img-prod'>
               <img src="data:image/jpeg;base64,${product.image}" alt="Imagen de ${product.name}">
               </div>
               <p class="text-end">${product.price}€</p>
            </a> 
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