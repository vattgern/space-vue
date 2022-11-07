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
                    <label for="#email">
                        <input type="email"
                                name="email"
                                id="email"
                                v-model="this.email"
                                placeholder="E-mail">
                    </label>
                    <label for="#password">
                        <input type="password"
                                name="password"
                                id="password"
                                v-model="this.password"
                                placeholder="Password">
                    </label>
                    <button @click.prevent="formData" class="login__btn">
                        LOGIN
                    </button>
                </form>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                email: '',
                password: '',
            }
        },
        methods:{
            closeModel(){
                this.$store.state.loginModel = false;
            },
            formData(){
                axios.get('/sanctum/csrf-cookie').then(response => {

                    axios.post('http://127.0.0.1:8000/api/login',{
                        'email': this.email,
                        'password': this.password

                    }).then(response =>{
                        console.log(response);
                        window.localStorage.setItem('token',response.data['access_token']);
                        this.$router.push({
                            name: 'main'
                        });
                    });

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
    height: 15%;
    width: 25%;

    background: transparent;
    border-top: 2px white solid;
    border-bottom: 2px white solid;

    color: white;
    font-size: 18px;
    letter-spacing: 1rem;
    transition: all 0.4s ease-in;
}
.login__btn:hover{
    letter-spacing: 0.5rem;
    border: none;
    background: white;
    color: black;
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
