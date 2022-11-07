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
        <nav class="header_nav nav_moblie" v-show="burgerMenu">
          <ul>
            <router-link :to="{name: 'about'}">about</router-link>
            <router-link :to="{name: 'main'}">planets</router-link>
            <router-link :to="{name: 'main'}">letter to space</router-link>
            <a v-show="burgerMenu"
                        v-on:click="showLogin">
                login
            </a>
          </ul>
          <div class="header_nav_moblie">
            <img :src="'./images/icons/close.svg'"
                v-on:click="burgerMenu = false"
                alt="">
          </div>
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
        data(){
            return{
                burgerMenu: false
            }
        },
        mounted(){
            console.log(window.outerWidth);
        },
        methods:{
            showModel(){
                if(window.outerWidth < 426){
                    this.burgerMenu = true;
                } else{
                    this.$store.state.loginModel = true;
                }
            },
            showLogin(){
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
    .header_nav_moblie{
        display: none;
    }
    .nav_moblie{
        display: none;
    }
    @media screen and (max-width: 425px) {
        header{
            justify-content: space-between;
        }
        .header_logo img{
            height: 100%;
            width: 50%;
            object-fit: contain;
        }
        .header_nav{
            display: none;
        }
        .nav_moblie{
            position: absolute;
            top: 2.5%;
            left: 0;
            width: 100%;
            padding: 2.5%;
            background-color: #000;
            z-index: 5;

            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header_nav ul{
            flex-direction: column;
            text-align: center;
        }
        .header_nav_moblie{
            display: block;
        }
    }
</style>
