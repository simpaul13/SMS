export default {
    mode : 'history',

    routes: [
        {
            path : "/",
            component: require('./test/example').default,
            name : "Home",
        },
    ],

}
