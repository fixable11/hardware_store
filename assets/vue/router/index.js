import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../components/Index/Index";
import Product from "../views/Product";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Index },
        { path: "/products/:id", component: Product },
        { path: "*", redirect: "/" }
    ],
});