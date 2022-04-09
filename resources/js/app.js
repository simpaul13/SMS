
require('./bootstrap');

import router from "./components/routes";
import VueRouter from "vue-router";
import Vue from "vue";

Vue.use(VueRouter)

const app = new Vue({

    el: '#app',
    router: new VueRouter(router)

});
