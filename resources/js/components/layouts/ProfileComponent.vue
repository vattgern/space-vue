<template>
    <h1 class="exit" v-on:click="logout">ВЫХОД</h1>
</template>

<script>
    import api from '../../api';
    export default {
        data(){
            return{

            }
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
.exit{
    color: white;
    font-size: 4rem;

    cursor: pointer;
}
</style>
