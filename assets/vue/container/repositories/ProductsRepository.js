const productsEndpoint = 'products';


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
}

export default ProductsRepository;