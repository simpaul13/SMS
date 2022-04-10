
require('./bootstrap');

import router from "./components/routes";
import Container from "./layouts/container";
import VueRouter from "vue-router";
import Vue from "vue";

Vue.use(VueRouter)

const app = new Vue({

    el: '#app',
    components: { Container },
    router: new VueRouter(router)

});
