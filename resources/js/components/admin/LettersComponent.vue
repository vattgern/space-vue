<template>
<div class="admin-users">
        <div class="admin-users-header">
            <h2>Letters</h2>
        </div>
        <div class="admin-users-main">
            <div v-show="this.$store.state.isLetters">
                <img :src="'./images/icons/Left-white.svg'"
                class="left"
                v-on:click="prev"
                alt="">
                <img :src="'./images/icons/Right-white.svg'"
                    alt=""
                    v-on:click="next"
                    class="right">
                <div class="slider" id="slider">
                    <div class="letter">
                        <div class="letter-email">
                            <h1>E-MAIL:</h1>
                            <p>{{ letters[index].email }}</p>
                        </div>
                        <div class="letter-text">
                            <h2>LETTER:</h2>
                            <p class="text_v_dive">{{ letters[index].content }}</p>
                        </div>
                        <div class="letter-btns">
                            <button class="approve" v-on:click="approveLetter(letters[index].id)">APPROVE</button>
                            <button class="delete" v-on:click="deleteLetter(letters[index].id)">DELETE</button>
                            <p class="status" v-if="letters[index].isAdmit">
                                ОДОБРЕНО
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-show="!this.$store.state.isLetters">
                Letters none
            </div>
        </div>
    </div>
</template>
<script>
import api from '../../api';
    export default {
        data(){
            return{
                index: 0,
                letters: [
                    {
                        email: '',
                        content: '',
                        id: '',
                        isAdmit: false,
                    }
                ]
            }
        },
        mounted(){
            this.getLetters();
        }, 
        computed:{
            showMes: function () {
                return this.isLetters;                
            }
        },
        methods:{
            getLetters(){
                api.get('http://127.0.0.1:8000/api/letters').then(response => {
                    if(response.data.data.lenght != 0){
                        this.letters = response.data.data;
                        this.$store.state.isLetters = true;
                    } else {
                        
                        this.$store.state.isLetters = false;
                    }
                    console.log(this.letters);
                });
            },
            approveLetter(id){
                api.put('http://127.0.0.1:8000/api/letters/' + id).then(response => {
                    this.setModal(response.data.msg, 'auth');
                    this.getLetters();
                });
            },
            deleteLetter(id){
                api.delete('http://127.0.0.1:8000/api/letters/' + id).then(response => {
                    this.index = 0;
                    this.getLetters();
                })
            },
            next(){
                if(this.letters.length == this.index){
                    this.index = 0
                } else {
                    this.index++;
                }
            },
            prev(){
                if(this.index <= 0){
                    this.index = this.letters.length;
                } else {
                    this.index--;
                }
            },
            setModal(text, classes){
                this.$store.state.modalShow = true;
                this.$store.state.modalMessage = text;
                this.$store.state.modalClass = classes;
            },
        }
    }
</script>

<style scoped>
    .left{
        position: absolute;
        left: 5%;
        top: 50%;
        transform: translate(-50%,-50%);
        cursor: pointer;
    }
    .right{
        position: absolute;
        right: 5%;
        top: 50%;
        transform: translate(-50%,-50%);
        cursor: pointer;
    }
    .slider{
        width: 100%;
        height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
    }
    .admin-users-main{
        position: relative;
        width: 75vw;
    }
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
    .letter{
        border: 2px solid white;
        width: 55vw;
        height: 35vw;
        display: flex;
        flex-direction: column;
    }
    .letter-email{
        width: 90%;
        height: 20%;
        display: flex;
        flex-direction: row;
        gap: 1vw;
        align-items: center;
        margin: 0 5%;
        font-family: sans-serif;
    }
    .letter-text{
        width: 90%;
        margin: 0 5%;
        height: 60%;
        display: flex;
        flex-direction: column;
        gap: 1vw;
        font-family: sans-serif;
    }
    .letter-text p{
        line-height: 1.5vw;
    }
    .letter-btns{
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .letter-btns > *{
        margin: 2.5%;
    }
    .approve{
        border: 1px solid white;
        color: white;
        background-color: #000;
        padding: 1vw 2vw;
        cursor: pointer;
    }

    .delete{
        border: 1px solid white;
        color: white;
        background-color: #000;
        padding: 1vw 2vw;
        cursor: pointer;
    }
    .status{
        font-family: sans-serif;
        font-weight: bold;
        padding: 1vw 2vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .obshi_div2{
        margin-left: 40vw;
        margin-top: -35.2vw;
        border: 2px solid ;
        width: 24vw;
        height: 35vw;
    }


</style>
