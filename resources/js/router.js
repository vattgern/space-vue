// Components
import IndexComponent from './components/IndexComponent.vue';
import AboutComponent from './components/layouts/AboutComponent.vue';
import ProfileComponent from './components/layouts/ProfileComponent.vue';
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
        }
    ]
});
