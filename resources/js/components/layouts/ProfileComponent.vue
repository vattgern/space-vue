<template>
    
    <div class="profile--header">
        <h2>{{ user.email }}</h2>
        <p class="exit" v-on:click="logout">ВЫХОД</p>
    </div>
    <div class="profile--body"></div>
</template>

<script>
    import api from '../../api';
    export default {
        data(){
            return{
                user: {}
            }
        },
        mounted() {
            api.get('http://127.0.0.1:8000/api/me').then(reponse => {
                this.user = reponse.data;
                console.log(this.user);
            });
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
.profile--header{
    width: 100vw;
    height: 20vw;

    color: white;

    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 2vw;
}
.profile--header h2{
    font-family: sans-serif;
}
.exit{
    color: white;
    font-size: 2vw;
    font-family: sans-serif;

    cursor: pointer;

    transition: all 0.4s ease-in;
}
.exit:hover{
    color: red;
}
.profile--body{
    width: 100vw;
    height: 60vh;
    border: 2px red solid;
}
</style>
