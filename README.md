# SPACEX-VUE
## Интсрукция
1. Загружаем проект laravel
2. ```npm i vue```
3. ```npm i vue-router```
4. ```npm i vuex ``` (При желании)
5. ```npm i @vitejs/plugin-vue```
6. ```npm i``` (Подстраховаться чтобы все установилось)
7. Заходим в файл vite.config.js
```
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
```
8. Тепеть в файл web.php
> Удаляем все роуты добавляем, котроый ниже,
чтобы все маршруты переходили на vue
```php
Route::get('/{any}', function () {
    return view('main');
})->where('any','.*');
```
9. В папке resources/js создаем файл app.js
> Здесь создается наше приложение с подключением библиотек
```javascript
import { createApp } from 'vue';
import store from './store';
import router from './router';
import MainComponent from "./components/MainComponent.vue";

createApp(MainComponent)
    // use указывает что мы используем вместе с приложением
    .use(router)
    .use(store)
    // mount указывает куда именно, в HTML-code будет отображаться код
    .mount('#app');
```
10. Создаем router.js
```javascript
// Импортируем функции из библиотек
import {createRouter, createWebHistory} from "vue-router";
// Components
import IndexComponent from './components/layouts/IndexComponent.vue';
import AboutComponent from './components/layouts/AboutComponent.vue';
import ProfileComponent from './components/layouts/ProfileComponent.vue';
import AdminComponent from './components/admin/AdminComponent.vue';
import PlanetComponent from "./components/layouts/PlanetComponent.vue";
// -------------------------------------------------
// export deafult позволяет в будущем использовать содержимое
// в других файлах
export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            // Путь по которому будет доступна страница
            path: '/',
            // Название для упрощения роутинга в компанентах
            // Не всегла же точно помнишь пути 
            name: 'main',
            // И компонент который будет отображаться 
            // по данному роуту
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
```
11. store.js (при желании)
```javascript
// Store
import {createStore} from "vuex";

export default createStore({
    state(){
        return {
            //...
        }
    },
    mutations:{
        //...
    }
});
```
12. Теперь объединяем в файле blade.php
```html
<head>
<!-- some code -->
    @vite('resources/css/app.css')
</head>
<body id="app">
<!-- some code -->
    @vite('resources/js/app.js')
</body>
```
13. Главный компонент MainComponent
```vue
<template>
    <main>
        <!-- router-view  - считайте это местом, 
        где будут отображаться ваши страницы 
        без перезагрузки страницы-->
        <router-view></router-view>
    </main>
</template>

<script>
    export default {
        mounted() {
          // ...
        },
        data(){
            return{
              // ...
            }
        },
        watch:{
          // ...
        },
        components:{
          // ... 
        },
        methods:{
          // ...
        }
    }
</script>

<style scoped>

</style>
```
