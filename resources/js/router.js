import vueRouter from "vue-router"
import Vue from "vue";
import StartGame from "./components/views/StartGame";
import Index from "./components/views/Index";
Vue.use(vueRouter);
const routes = [
    {
        path: "/",
        component: StartGame
    },
    {
        path:"/start-game",
        component:Index
    }
];
export default new vueRouter({
    mode:"history",
    routes
})
