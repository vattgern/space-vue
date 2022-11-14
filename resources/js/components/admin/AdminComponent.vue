<template>
    <section class="admin">
        <div class="sidebar">
            <div class="sidebar-header">
                <img :src="'./images/icons/Logo.svg'" alt="">
            </div>
            <ul class="sidebar-links">
                <li v-on:click="show = 'letter'">letters</li>
                <li v-on:click="show = 'user'">users</li>
                <li v-on:click="logout">logout</li>
            </ul>
        </div>
        <div class="admin-view">
            <LettersComponent v-show="show === 'letter'"></LettersComponent>
            <UsersComponent v-show="show === 'user'"></UsersComponent>
        </div>
    </section>
</template>
<script>
import UsersComponent from './UsersComponent.vue';
import LettersComponent from './LettersComponent.vue';
import api from '../../api';
    export default {
        data(){
            return{
                show: 'user'
            }
        },
        components:{
            UsersComponent,
            LettersComponent
        },
        methods:{
            logout(){
                api.post('http://127.0.0.1:8000/api/logout').then(response =>{
                        localStorage.clear();
                        sessionStorage.clear();
                        this.$router.push({
                            name: 'main'
                        });
                    });
            }
        }
    }
</script>

<style scoped>
    .admin{
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-direction: row;
        color: white;
    }
    .sidebar{
        width: 25vw;
        height: 100vh;
        border-right: 2px rgb(85, 85, 85) solid;
    }
    .sidebar-header{
        width: 90%;
        height: 15%;
        display: flex;
        align-items: center;
        margin-left: 5%;
    }
    .sidebar-links{
        width: 90%;
        height: 75%;
        list-style-type: none;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: left;
        gap: 15%;

        font-family: sans-serif;
        text-transform: uppercase;
        font-size: 24px;
    }
    .sidebar-links li{
        cursor: pointer;
    }

</style>
