<template>
    <header>
        <div class="header_logo">
            <router-link :to="{ name:'main' }">
                <img :src="'/images/icons/Logo.svg'" alt="qwerty"/>
            </router-link>
        </div>
        <nav class="header_nav">
          <ul>
            <router-link :to="{name: 'about'}">about</router-link>
            <router-link :to="{name: 'main'}">planets</router-link>
            <a
            v-on:click="this.$store.state.letter = true">letter to space</a>
            <router-link :to="{name: 'profile'}" v-show="profile">profile</router-link>
          </ul>
        </nav>
        <nav class="header_nav nav_moblie" v-show="burgerMenu">
          <ul>
            <router-link :to="{name: 'about'}">about</router-link>
            <router-link :to="{name: 'main'}">planets</router-link>
              <a
                  v-on:click="this.$store.state.letter = true">letter to space</a>
            <a v-show="burgerMenu"
                        v-on:click="showLogin">
                login
            </a>
          </ul>
          <div class="header_nav_moblie">
            <img :src="'/images/icons/close.svg'"
                v-on:click="burgerMenu = false"
                alt="">
          </div>
        </nav>
        <div class="header_menu">
            <img :src="'/images/icons/Burger.svg'"
                 v-show="authMenu"
                 v-on:click="showModel"
                 alt="qwerty" />
        </div>
    </header>
</template>

<script>
    export default {
        data(){
            return{
                burgerMenu: false,
                authMenu: false,
                profile: false
            }
        },
        mounted(){
            this.authMenu = this.showMenu();
            this.profile = this.showProfile();
        },
        watch:{
            '$route'(){
                this.$data.profile = this.showProfile();
                this.$data.authMenu = this.showMenu();
            }
        },
        methods:{
            showModel(){
                if(window.outerWidth < 674){
                    this.burgerMenu = true;
                } else{
                    this.$store.state.loginModel = true;
                }
            },
            showLogin(){
                this.$store.state.loginModel = true;
            },
            checkProfile(){
                if(window.localStorage.getItem('token')){
                    this.$store.state.auth = true;
                } else{
                    this.$store.state.auth = false;
                }
            },
            showProfile(){
                return window.localStorage.getItem('token') ? true : false;
            },
            showMenu(){
                return window.localStorage.getItem('token') ? false : true;
            }
        }
    }
</script>

<style scoped>
    header {
        height: 75px;
        padding: 50px 0;
        display: flex;
        align-items: center;
        background: transparent;
    }
    header *{
        background: transparent;
    }
    .header_logo {
        width: 25%;
        display: flex;
        justify-content: center;
    }
    .header_nav {
        width: 55%;
        display: flex;
        justify-content: flex-end;
    }
    .header_nav ul {
        width: 60%;
        display: flex;
        justify-content: space-between;
    }
    .header_nav ul a {
        cursor: pointer;
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
    @media screen and (max-width: 1024px) and (min-width: 675px){
        .header_nav ul{
            width: 100%;
        }

    }
    @media screen and (max-width: 674px) {
        header{
            justify-content: space-between;
            background: transparent;
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
            background-color: black;
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
