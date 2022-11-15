<template>
        <div class="modalLogin" v-if="this.$store.state.loginModel">
            <div class="modal__header">
                <figure class="logo">
                    <img :src="'./images/icons/Logo.svg'"
                         v-on:click="closeModel"
                         alt="">
                </figure>
                <figure class="close">
                    <img :src="'./images/icons/close.svg'"
                         v-on:click="closeModel"
                         alt="">
                </figure>
            </div>
            <div class="modal__body">
                <form class="modal__form">
                    <label for="#email" v-show="modeLogin">
                        <input type="email"
                                name="email"
                                id="email"
                                v-model="this.login.email"
                                placeholder="E-mail">
                    </label>

                    <label for="#email" v-show="!modeLogin">
                        <input type="email"
                                name="email"
                                id="email"
                                v-model="this.register.email"
                                placeholder="E-mail">
                    </label>

                    <label for="#password" v-show="modeLogin">
                        <input type="password"
                                name="password"
                                id="password"
                                v-model="this.login.password"
                                placeholder="Password">
                    </label>

                    <label for="#password" v-show="!modeLogin">
                        <input type="password"
                                name="password"
                                id="password"
                                v-model="this.register.password"
                                placeholder="Password">
                    </label>
                    <label for="#password" v-show="!modeLogin">
                        <input type="password"
                                name="password"
                                id="password"
                                v-model="this.register.confirmPass"
                                placeholder="Confirm password">
                    </label>
                    <button @click.prevent="formData" class="login__btn">
                        {{ this.modeLogin ? 'LOGIN' : 'REGISTER' }}
                    </button>
                    <p class="changeModeLogin" v-on:click="changeMode">
                        {{ this.modeLogin ? 'No account?' : 'Have account?' }}
                    </p>
                </form>
            </div>
        </div>
</template>

<script>
import api from '../api';

    export default {
        data(){
            return{
                modeLogin: true,
                login: {
                    email: '',
                    password: '',
                },
                register:{
                    email: '',
                    password: '',
                    confirmPass: ''
                }
            }
        },
        methods:{
            closeModel(){
                this.$store.state.loginModel = false;
            },
            changeMode(){
                if(this.modeLogin){
                    this.modeLogin = false;
                } else{
                    this.modeLogin = true;
                }
            },
            roleCheck(){
                api.get('/sanctum/csrf-cookie').then(r => {
                    api.get('http://127.0.0.1:8000/api/me').then(response =>{
                        window.localStorage.setItem('role', response.data['role']);

                        this.$store.state.loginModel = false;

                        if(window.localStorage.getItem('role') == 'admin'){
                            this.$router.push({ name: 'admin' });
                        } else {
                            this.$router.push({ name: 'profile' });
                        }
                    });
                });
            },
            loginSend(){
                api.post('http://127.0.0.1:8000/api/login',{
                    'email': this.login.email,
                    'password': this.login.password
                }).then(response =>{
                    this.login.email = '';
                    this.login.password = '';

                    window.localStorage.setItem('token',response.data['access_token']);
                    this.roleCheck();
                });
            },
            registerSend(){
                api.post('http://127.0.0.1:8000/api/reg',{
                    'email' : this.register.email,
                    'password' : this.register.password,
                    'password_confirmation' : this.register.confirmPass
                }).then(response =>{
                    this.register.email = '';
                    this.register.password = '';
                    this.register.confirmPass = '';

                    window.localStorage.setItem('token',response.data['access_token']);
                    this.roleCheck();
                });
            },
            formData(){
                axios.get('/sanctum/csrf-cookie').then(response => {

                    if(this.modeLogin){
                    // Если пользователь авторизуется
                        this.loginSend();
                    } else {
                        if(this.register.password === this.register.confirmPass){
                            this.registerSend();
                        }
                    }
                });
            }
        }
    }
</script>

<style scoped>
.modalLogin{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);

    width: 70vw;
    height: 80vh;

    background-image: url("./images/backgrounds/stars.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 10;
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
.modal__header{
    width: 75%;
    height: 20%;
    margin-top: 5%;

    display: flex;
    justify-content: space-between;
    align-items: center;
}
.close{
    cursor: pointer;
}
.modal__body{
    width: 75%;
    height: 70%;
    margin-bottom: 5%;

    display: flex;
    justify-content: center;
    align-items: center;
}
.modal__form{
    width: 100%;
    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
}
.modal__form input{
    width: 100%;
    height: 150%;
    padding-left: 1.5%;

    background: transparent;
    outline: none;
    border: none;
    border-bottom: 2px white solid;

    font-family: sans-serif;
    font-size: 20px;
    color: white;
    letter-spacing: 0.25rem;
}
.modal__form input::placeholder{
    color: rgba(255, 255, 255, 0.66);
    letter-spacing: 0.25rem;
}
.modal__form label{
    width: 100%;
    margin: 5% 0;
}
.login__btn{
    cursor: pointer;
    margin-top: 5%;
    padding: 2.5% 0;
    width: 200px;

    background: transparent;
    border-top: 2px white solid;
    border-bottom: 2px white solid;

    color: white;
    font-size: 18px;
    letter-spacing: 0.75rem;
    transition: all 0.4s ease-in;
}
.login__btn:hover{
    letter-spacing: 0.5rem;
    border: none;
    background: white;
    color: black;
}
.changeModeLogin{
    cursor: pointer;
    margin-top: 5%;
    color: white;
    font-family: sans-serif;
    font-weight: bold;
    letter-spacing: 0.15rem;
}
@media screen and (max-width:425px) {
    .modalLogin{
        width: 100vw;
        height: 100vh;
    }
    .modal-shadow{
        display: none;
    }
    .modal__header{
        width: 100%;
    }
    .modal__body{
        width: 90%;
    }
    .modal__form{
        height: 50%;
    }
    .login__btn{
        height: 20%;
        width: 35%;
        letter-spacing: 0.5rem;
        border: none;
        background: white;
        color: black;
    }
}
</style>
