const productsEndpoint = 'products';
const productEndpoint = 'products/{sku}';


/**
 * Класс для работы с инвайтами
 */
class ProductsRepository {

    /**
     * Constructor.
     *
     * @param ApiService
     */
    constructor(ApiService) {
        this.api = ApiService;
    }

    /**
     * Get all products.
     *
     * @returns {Promise<*>}
     */
    async getAllProducts() {
        return this.api.get(productsEndpoint);
    }

    /**
     * Get product by sku.
     *
     * @param sku
     * @returns {Promise<*>}
     */
    async getProduct(sku) {
        return this.api.get(productEndpoint.replace('{sku}', sku));
    }
}

export default ProductsRepository;