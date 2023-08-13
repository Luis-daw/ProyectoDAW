export default class ShoppingCart{

    #shoppingCart;
    #init(){

    }
    constructor(){

    }

    /**
     * Metodo con el que solo podemos tener una instancia unica del carrito.
     * 
     * @returns shoppingcart
     */
    getInstance(){
        if(!this.#shoppingCart){
            this.#init();
        }
        return this.#shoppingCart;
    }
}