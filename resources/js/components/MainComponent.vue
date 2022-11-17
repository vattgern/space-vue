<template>
    <HeaderComponent v-show="!adminShow"></HeaderComponent>
    <main>
        <router-view></router-view>
    </main>
    <transition name="login">
        <LoginComponent></LoginComponent>
    </transition>
    <Transition name="shadowModal">
        <div class="modal-shadow" v-if="this.$store.state.loginModel" v-on:click="closeModel"></div>
    </Transition>
    <LetterToSpaceComponent v-if="this.$store.state.letter"></LetterToSpaceComponent>
</template>

<script>
    import HeaderComponent from './HeaderComponent.vue';
    import LoginComponent from './LoginComponent.vue';
    import LetterToSpaceComponent from './LetterToSpaceComponent.vue';
    export default {
        mounted() {

        },
        data(){
            return{
                adminShow: false
            }
        },
        watch:{
            '$route'(){
                this.$data.adminShow = this.adminCheck();
            }
        },
        components:{
            HeaderComponent,
            LoginComponent,
            LetterToSpaceComponent
        },
        methods:{
            closeModel(){
                this.$store.state.loginModel = false;
            },
            adminCheck(){
                return localStorage.getItem('role') === 'admin' ? true : false;
            }
        }
    }
</script>

<style scoped>
    main{
        overflow-x: hidden;
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
    @media screen and (max-width:425px){
        .modal-shadow{
            display: none;
        }
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
