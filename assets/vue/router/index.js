import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../views/Index";
import Product from "../views/Product";
import NotFound from "../views/NotFound";
import Cart from "../views/Cart";
import AboutUs from "../views/AboutUs";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Index },
        { path: "/products/:sku", component: Product },
        { path: '/404', component: NotFound },
        { path: '/cart', component: Cart },
        { path: '/about-us', component: AboutUs, name: "aboutUs" },
        { path: '*', redirect: '/404' },
    ],
});