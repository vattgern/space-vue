<template>
    <div class="admin-users">
        <div class="admin-users-header">
            <h2>users</h2>
        </div>
        <div class="admin-users-main">
            <div class="user-block" v-for="user in users">
                <div class="user-block-name">
                    <p> {{ user.email }} </p>
                </div>
                <button>DELETE</button>
            </div>
        </div>
    </div>
</template>
<script>
import api from '../../api';

    export default {
        data(){
            return{
                users: []
            }
        },
        mounted(){
            this.loadUsers();
        },
        methods:{
            loadUsers(){
                api.get('http://127.0.0.1:8000/api/users').then(users => {
                    users.data.data.forEach(user => {
                        this.users.push(user);
                    });
                });
            }
        }
    }
</script>

<style scoped>
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
    .admin-users-main{
        width: 75vw;
        height: 100vh;

        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-template-rows: repeat(4,1fr);
        margin-left: 2.5%;
    }
    .user-block{
        width: 90%;
        height: 66%;
        display: flex;
        flex-direction: column;
        border: 2px #303030 solid;
    }
    .user-block-name{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

        font-family: sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.15vw;
    }
    .user-block button{
        width: 95%;
        background: none;
        color: white;
        letter-spacing: 0.15vw;
        font-size: 1vw;
        border: 2px #303030 solid;
        margin: 5% 2.5%;
        padding: 2.5% 0;
        cursor: pointer;
    }
</style>
