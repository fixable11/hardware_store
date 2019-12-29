import './bootstrap.js';
import Vue from "vue";
import App from "./App";
import "./app.scss";
import router from './router';
import store from "./store";
import container from './container/container';
import jquery from 'jquery';

require('./assets/js/header');

window.$ = jquery;
window.JQuery = jquery;

new Vue({
    components: { App },
    template: "<App/>",
    router,
    store,
    provide: container,
}).$mount("#app");