require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import { Form, HasError, AlertError } from "vform";

import Swal from "sweetalert2";
window.Swal = Swal;

import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

Vue.component("v-select", vSelect);

Vue.use(VueRouter);

let routes = [
    {
        path: "/home",
        component: require("./components/Home.vue").default,
    },
    {
        path: "/dashboard",
        component: require("./components/Dashboard.vue").default,
    },
    {
        path: "/events",
        component: require("./components/Events.vue").default,
    },
    {
        path: "/courses",
        component: require("./components/Courses.vue").default,
    },
    {
        path: "/users",
        component: require("./components/Users.vue").default,
    },
    {
        path: "/create-user",
        component: require("./components/CreateUser.vue").default,
    },
    {
        path: "/user/:id",
        component: require("./components/EditUser.vue").default,
        name: "editUser",
    },
    {
        path: "/user/:id",
        component: require("./components/ViewUser.vue").default,
        name: "viewUser",
    },
    {
        path: "/create-course",
        component: require("./components/CreateCourse.vue").default,
    },
    {
        path: "/course/:id",
        component: require("./components/ViewCourse.vue").default,
        name: "viewCourse",
    },
    {
        path: "/course/:id",
        component: require("./components/EditCourse.vue").default,
        name: "editCourse",
    },
    {
        path: "/create-event",
        component: require("./components/CreateEvent.vue").default,
    },
    {
        path: "/event/:id",
        component: require("./components/ViewEvent.vue").default,
        name: "viewEvent",
    },
    {
        path: "/event/:id",
        component: require("./components/EditEvent.vue").default,
        name: "editEvent",
    },
];

const router = new VueRouter({
    mode: "history",
    routes, // short for `routes: routes`
});

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    router,
});
