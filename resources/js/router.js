import vueRouter from "vue-router"
import Vue from "vue";
import StartGame from "./components/views/StartGame";
import Index from "./components/views/Index";
import Game from "./components/views/Game";
import PP from "./components/PP";
Vue.use(vueRouter);
const routes = [
    {
        path: "/",
        component: Game
    },
    {
        path:"/start-game",
        component:Game
    },
    {
        path:"/game",
        component:Game
    },
    {
        path:"/privacy-policy",
        component:PP
    }
];
export default new vueRouter({
    mode:"history",
    routes
})
