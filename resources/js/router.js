// Components
import IndexComponent from './components/layouts/IndexComponent.vue';
import AboutComponent from './components/layouts/AboutComponent.vue';
import ProfileComponent from './components/layouts/ProfileComponent.vue';
import AdminComponent from './components/admin/AdminComponent.vue';
import PlanetComponent from "./components/layouts/PlanetComponent.vue";
import {createRouter, createWebHistory} from "vue-router";
// -------------------------------------------------
// Routers
export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'main',
            component: IndexComponent
        },
        {
            path: '/about',
            name: 'about',
            component: AboutComponent
        },
        {
            path: '/profile',
            name: 'profile',
            component: ProfileComponent
        },
        {
            path: '/dashboard',
            name: 'admin',
            component: AdminComponent
        },
        {
            path: '/planet/:id',
            name: 'planet',
            component: PlanetComponent
        }
    ]
});
