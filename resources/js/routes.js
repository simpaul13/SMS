import index from "./components/index";
import about from "./components/about";
import productshow from "./components/productshow";

export default {
    mode : 'history',

    routes: [
        {
            path : "/",
            component:index,
            name : "Home",
        },
        {
            path : "/about",
            component:about,
            name : "About",
        },
        {
            path: "/products/:id",
            component:productshow,
            name : "ProductShow",
        },
    ],

    linkActiveClass: "active"
}
