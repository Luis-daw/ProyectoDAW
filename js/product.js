export default class Product {
    
   #id;
   #name;
   #provider;
   #price;
   #image;
   constructor(name, provider, price, image, id = null){
       this.#name = name;
       this.#provider = provider;
       this.#price = price;
       this.#image = image;
       this.#id = id;
   }
   get name(){
       return this.#name;
   }
   get id(){
       return this.#id;
   }
   get provider(){
       return this.#provider;
   }
   get price(){
       return this.#price;
   }
   get image(){
     return this.#image;
   }
   set id(id){
       this.#id = id;
   }
   set name(name){
       this.#name = name;
   }
   set provider(provider){
       this.#provider = provider;
   }
   set price(price){
       this.#price = price;
   }
   set image(image){
     this.#image = image;
   }
}