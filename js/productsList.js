import Product from "./product.js";

export default class ProductsList {
    #productList;
    /*
    Estructura de datos:
    
    producto [{
        product: Product
        quantity: number
    }]
     */
    constructor() {
        this.#productList = [];
    }

    addProduct(product, quantity = 1) {
        if (!quantity) throw new Error();
        let pos = this.findProduct(product);
        if (pos >= 0) {
            this.#productList[pos].quantity += quantity;
        } else {
            let prod = {
                product: product,
                quantity: quantity,
            };
            this.#productList.push(prod);
            console.log(prod);
        }
    }
    findProduct(product) {
        return this.#productList.findIndex(
            (prod) => prod.product.id === product.id
        );
    }
    generateProducts() {
        let prod1 = new Product("test1", 1, "Paco", 0, 100);
        let prod2 = new Product("test2", 2, "Paco", 0, 200);
        let prod3 = new Product("test3", 3, "Paco", 0, 300);
        let prod4 = new Product("test4", 4, "Paco", 0, 400);
        this.addProduct(prod1);
        this.addProduct(prod1);
        this.addProduct(prod2);
        this.addProduct(prod3, 5);
        this.addProduct(prod4, 3);
        console.log(this.#productList);
        console.log("Resultado esperado test1 2 test2 1 test3 5 test4 3");
    }
}
