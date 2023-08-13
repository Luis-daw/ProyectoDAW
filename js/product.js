export default class Product {
    
    #name;
    #id;
    #seller;
    #quantity;
    #price;

    constructor(name, id, seller, quantity, price){
        this.#name = name;
        this.#id = id;
        this.#seller = seller;
        this.#quantity = quantity;
        this.#price = price;
    }
    get name(){
        return this.#name;
    }
    get id(){
        return this.#id;
    }
    get seller(){
        return this.#seller;
    }
    get quantity(){
        return this.#quantity;
    }
    get price(){
        return this.#price;
    }
    set name(name){
        this.#name = name;
    }
}