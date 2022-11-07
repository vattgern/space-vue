<template>
    <header>
        <div class="header_logo">
            <router-link :to="{ name:'main' }">
                <img :src="'./images/icons/Logo.svg'" alt="qwerty"/>
            </router-link>
        </div>
        <nav class="header_nav">
          <ul>
            <router-link :to="{name: 'about'}">about</router-link>
            <router-link :to="{name: 'main'}">planets</router-link>
            <router-link :to="{name: 'main'}">letter to space</router-link>
          </ul>
        </nav>
        <div class="header_menu">
            <img :src="'./images/icons/Burger.svg'"
                 v-on:click="showModel"
                 alt="qwerty" />
        </div>
    </header>
</template>

<script>
    export default {
        mounted() {

        },
        methods:{
            showModel(){
                this.$store.state.loginModel = true;
            }
        }
    }
</script>

<style scoped>
    header {
        display: flex;
        align-items: center;
        height: 75px;
        margin-top: 50px;
    }
    .header_logo {
        width: 25%;
        display: flex;
        justify-content: center;
    }
    .header_nav {
        display: flex;
        width: 55%;
        justify-content: flex-end;
    }
    .header_nav ul {
        display: flex;
        justify-content: space-between;
        width: 60%;
    }
    .header_nav ul a {
        text-decoration: none;
        font-family: "Jost", sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 1.2em;
        color: #ffffff;
        text-transform: uppercase;
    }
    .header_nav ul a li {
        text-decoration: none;
        list-style-type: none;
    }
    .header_menu {
        width: 20%;
        display: flex;
        justify-content: center;
    }

    .header_menu img{
        cursor: pointer;
    }
</style>
