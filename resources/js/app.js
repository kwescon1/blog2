/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require("./bootstrap");

window.Vue = require("vue").default;
window.axios = require("axios");
import vue_moment from "vue-moment";
Vue.use(vue_moment);
import JwPagination from "jw-vue-pagination";

Vue.component("jw-pagination", JwPagination).default;

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "recent-post-component",
    require("./components/RecentPostComponent.vue").default
);
Vue.component(
    "comment-component",
    require("./components/CommentComponent.vue").default
);

const app = new Vue({
    el: "#app",
});
