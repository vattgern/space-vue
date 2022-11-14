import './bootstrap';
import { createApp } from 'vue';
import store from './store';
import router from './router';
import MainComponent from "./components/layouts/MainComponent.vue";


// Если пользователь не админ его переносит на главную
// router.beforeEach((to, from, next) => {
//     if (to.name !== 'admin' &&
//         (!localStorage.getItem('token') || localStorage.getItem('role') != 'admin')) {
//         next({ name: 'main' })
//     } else next()
// })

createApp(MainComponent)
    .use(router)
    .use(store)
    .mount('#app');
