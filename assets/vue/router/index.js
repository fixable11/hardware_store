import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../components/Home";
import Test from "../components/Test";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/home", component: Home },
        { path: "/test", component: Test },
        { path: "*", redirect: "/home" }
    ],
});