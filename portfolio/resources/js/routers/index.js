import { createRouter, createWebHistory } from "vue-router";
import Education from "../components/Education/Education.vue";
import Portfolio from "../components/Portfolio/Portfolio.vue";
import Awards from "../components/Awards/Awards.vue";
import Admin from "../components/Admin/Admin.vue";
import TopPage from "../components/TopPage/TopPage.vue";
import NotFound from "../components/PageNotFound/PageNotFound.vue";

const routes = [
    {
        path: '/',
        component: TopPage,
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notfound',
        component: NotFound
    },
    {
        path: '/about',
        component: TopPage
    },
    {
        path: '/education',
        component: Education
    },
    {
        path: '/portfolio',
        component: Portfolio
    },
    {
        path: '/awards',
        component: Awards
    },
    {
        
        path: '/skills',
        component: Education
    },
    {
        
        path: '/admin',
        component: Admin
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});