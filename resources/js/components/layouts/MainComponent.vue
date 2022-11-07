<template>
    <HeaderComponent></HeaderComponent>
    <main>
        <router-view></router-view>
    </main>
    <transition name="login">
        <LoginComponent></LoginComponent>
    </transition>
    <Transition name="shadowModal">
        <div class="modal-shadow" v-if="this.$store.state.loginModel" v-on:click="closeModel"></div>
    </Transition>
</template>

<script>
    import HeaderComponent from '../HeaderComponent.vue';
    import LoginComponent from '../LoginComponent.vue';

    export default {
        mounted() {

        },
        data(){
            return{

            }
        },
        components:{
            HeaderComponent,
            LoginComponent
        },
        methods:{
            closeModel(){
                this.$store.state.loginModel = false;
            }
        }
    }
</script>

<style scoped>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .shadowModal-enter-active,
    .shadowModal-leave-active{
        transition: all 0.4s ease-in;
    }
    .shadowModal-enter-from,
    .shadowModal-leave-to{
        transform: translate(0,15%);
        opacity: 0;
    }
    .modal-shadow{
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.75);
        z-index: 9;
    }
    .login-enter-active,
    .login-leave-active{
        transition: all 0.4s 0.25s ease-in;
    }
    .login-enter-from,
    .login-leave-to{
        transform: translate(-50%,15%);
        opacity: 0;
    }
</style>
