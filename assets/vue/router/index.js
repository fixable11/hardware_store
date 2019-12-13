import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../components/Index";
import Test from "../components/Test";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Index },
        { path: "/test", component: Test },
        { path: "*", redirect: "/" }
    ],
});