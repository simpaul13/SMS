
require('./bootstrap');

import router from "./components/routes";
import Container from "./layouts/container";
import Navbar from "./layouts/navbar";
import Sidebar from "./layouts/sidebar";
import VueRouter from "vue-router";
import Vue from "vue";

Vue.use(VueRouter)

const app = new Vue({

    el: '#app',
    components: { Container, Navbar, Sidebar },
    router: new VueRouter(router)

});
