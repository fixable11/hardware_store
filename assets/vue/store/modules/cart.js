const state = {
    products: [],
};

const getters = {
    getProducts: state => state.products,
    getProductsCount: state => state.products.length,
};

const mutations = {
    addProduct(state, product) {
        state.products.push(product);
    },
    removeProduct(state, index) {
        state.products.splice(index, 0);
    }
};

const actions = {
    async fetchProducts({commit}) {
        // const {data: products} = await axios.get);
        // commit('addProducts', products);
    }
};

export default {
    //namespaced: true,
    state,
    getters,
    actions,
    mutations,
};