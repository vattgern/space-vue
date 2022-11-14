<template>
    <section class="admin">
        <div class="sidebar">
            <div class="sidebar-header">
                <img :src="'./images/icons/Logo.svg'" alt="">
            </div>
            <ul class="sidebar-links">
                <li>
                    letters
                </li>
                <li>users</li>
                <li v-on:click="logout">logout</li>
            </ul>
        </div>
        <div class="admin-view">
            <div class="admin-users">
                <div class="admin-users-header">
                    <h2>users</h2>
                </div>
                <AdminUsersComponent></AdminUsersComponent>
            </div>
        </div>
    </section>
</template>
<script>
import AdminUsersComponent from './AdminUsersComponent.vue';
import api from '../../api';
    export default {
        data(){
            return{

            }
        },
        components:{
            AdminUsersComponent
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
    .admin-users-header{
        width: 100%;
        height: 25%;
    }
    .admin-users-header h2{
        text-transform: uppercase;
        font-family: sans-serif;
        font-size: 2vw;
        margin: 2.5% 7%;
        letter-spacing: 0.15vw;
    }
</style>
