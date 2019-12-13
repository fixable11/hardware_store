import {ApiService} from '../service/ApiService';
import ProductsRepository from './repositories/ProductsRepository';

export default {
    productsRepository: new ProductsRepository(ApiService),
};
