export default {
    routes: [
        {
            path : "/",
            component: require('./test/example').default,
        },
        // classroom
        {
            path : "/classroom",
            component: require('./classroom/index').default,
        },
        // subject
        {
            path : "/subject",
            component: require('./subject/index').default,
        },
        // course
        {
            path : "/course",
            component: require('./course/index').default,
        },
        // student
        {
            path : "/student",
            component: require('./student/index').default,
        },
        // teacher
        {
            path : "/teacher",
            component: require('./teacher/index').default,
        },


    ],

}
