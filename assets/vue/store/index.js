import Vue from "vue";
import Vuex from "vuex";
import ProductsModule from "./modules/products";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        products: ProductsModule
    }
});