<template>
    <div class="letterToSpace">
        <div class="letterHeader">
            <h1>LETTER TO SPACE</h1>
            <div class="letterHeaderClose">
                <img v-on:click="this.$store.state.letter = false" :src="'./images/icons/close.svg'" alt="">
            </div>
        </div>
        <div class="letterEmail">
            <input type="email" v-model="email" class="letter_input" placeholder="E-MAIL" />
        </div>
        <div class="letterText">
            <textarea class="text" v-model="text" placeholder="WRITE SOMETHING"></textarea>
        </div>
        <div class="letterSubmit">
            <button class="submit_button" v-on:click="sendLetter">SEND</button>
        </div>
        <div class="backText">
            <p>
                Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.
                Lorem Ipsum является стандартной "рыбой" для текстов на латинице с
                начала XVI века. В то время некий безымянный печатник создал большую
                коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки
                образцов. Lorem Ipsum не только успешно пережил без заметных изменений
                пять веков, но и перешагнул в электронный дизайн. Его популяризации в
                новое время послужили публикация листов Letraset с образцами Lorem Ipsum
                в 60-х годах и, в более недавнее время, программы электронной вёрстки
                типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
            </p>
        </div>
    </div>
</template>

<script>
import api from '../api';
    export default {
        data(){
            return{
                email: '',
                text: ''
            }
        },
        methods:{
            sendLetter(){
                if(this.email == '' || this.text == ''){
                    this.setModal("Пустые данные", "danger");
                } else {
                    if(this.email.indexOf('@') > -1){
                        api.post('http://127.0.0.1:8000/api/letter',{
                            'email' : this.email,
                            'content' : this.text,
                            'isAdmit' : false,
                        }).then(response => {
                            if(response.errors){
                                setModal("Неверно введены данные", 'danger');
                            } else {
                                this.email = ''
                                this.text = ''
                                this.setModal("Письмо отправлено", 'auth');
                                this.$store.state.letter = false
                            }
                        });
                    } else {
                        this.setModal("Почта неверно введена", "danger");
                    }
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

<style lang="css" scoped>
.letterToSpace {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    z-index: 99;
    background-color: rgba(0, 0, 0, 0.97);
    width: 85%;
    height: 90%;
}
.letterHeader {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 7.5vw;

    font-size: 1.8vw;
    font-family: "Jost", sans-serif;
    color: white;
}
.letterHeaderClose {
    cursor: pointer;
}
.letterEmail {
    height: 1.5vw;
    width: 25vw;
    margin: 2.5vw 7.5vw;
}
.letter_input {
    outline: none;
    border: none;
    border-bottom: solid 0.1vw white;

    font-family: "Jost", sans-serif;
    letter-spacing: 0.15vw;
    background: none;
    font-size: 0.9vw;
    height: 1.5vw;
    width: 35vw;
    padding: 0.5% 2.5%;
}
.letterText {
    height: 10vw;
    width: 20vw;
    margin: 2.5vw 7.5vw;
}
.letterSubmit {
    margin: 7.5vw;
}
.text {
    width: 35vw;
    height: 15vw;

    font-family: "Jost", sans-serif;
    letter-spacing: 0.15vw;

    outline: none;
    background: none;
    border-bottom: solid 0.1vw white;
    border-top: solid 0.1vw white;
    border-right: none;
    border-left: none;
}
.submit_button {
    color: white;
    font-size: 1.4vw;
    font-family: "Jost", sans-serif;

    background:none;
    border-bottom: solid 0.1vw white;
    border-top: solid 0.1vw white;
    border-right: none;
    border-left: none;
    outline: none;

    width: 16vw;
    height: 4vw;
    letter-spacing: 0.2vw;

    transition: all 0.4s ease-in-out;
}
.submit_button:hover{
    background-color: white;
    color: black;
    letter-spacing: normal;
}
input,
textarea {
    color: white;
}
textarea {
    resize: none;
    padding: 0.5% 3%;
}
.backText{
    position: absolute;
    top: 50%;
    right: -15%;

    width: 30vw;
    height: 75%;

    transform: translate(-50%,-50%);
    display: flex;
    justify-content: center;
    align-items: center;

    perspective: 1000px;
    overflow: hidden;
}
.backText p{
    text-align: center;
    color: white;
    font-family: 'Jost', sans-serif;
    font-size: 1.25vw;
    font-weight: 300;
    line-height: 2vw;
    margin: 5%;

    transform: rotateX(25deg) translateY(61vh);
    animation: textAnim 35s infinite ease-in-out;
}

@keyframes textAnim{
    0%{
        transform: rotateX(25deg) translateY(61vh);
    }
    25%{
        transform: rotateX(25deg) translateY(-5vh);
    }
    50%{
        transform: rotateX(25deg) translateY(61vh);
    }
    100%{
        transform: rotateX(25deg) translateY(0vh);
    }
}
/* ------------------------------------------------------- */
@media screen and (max-width: 1366px) and (min-width: 1025px){
    .letterHeader{
        margin: 2.5vw 7vw;
    }
    .letterEmail{
        width: 40vw;
        height: 5vh;
    }
    .letter_input{
        width: 100%;
        height: 100%;
        font-size: 1.25vw;
    }
    .letterText{
        width: 40vw;
        height: 40vh;
    }
    .text{
        width: 100%;
        height: 100%;
        font-size: 1.25vw;
    }
    .letterSubmit{
        margin: 2.5vw 7.5vw;
    }
}
@media screen and (max-width: 1024px) and (min-width: 768px){
    .letterToSpace{
        width: 100%;
        height: 100%;
    }
    .backText{
        display: none;
    }
    .letterHeader{
        margin: 2.5vw 7vw;
    }
    .letterEmail{
        width: 85%;
        height: 7.5vh;
    }
    .letter_input{
        width: 100%;
        height: 100%;
        font-size: 2.5vw;
    }
    .letterText{
        width: 85%;
        height: 50vh;
    }
    .text{
        width: 100%;
        height: 100%;
        font-size: 2.5vw;
    }
    .letterSubmit{
        margin: 2.5vw 7.5vw;
    }
    .submit_button{
        width: 30vw;
        height: 7.5vw;
        font-size: 2.75vw;
    }
}
@media screen and (max-width: 767px){
    .letterToSpace{
        width: 100%;
        height: 100%;
    }
    .backText{
        display: none;
    }
    .letterHeader{
        margin: 2.5vw 7vw;
        font-size: 2.5vw;
    }
    .letterEmail{
        width: 85%;
        height: 7.5vh;
    }
    .letter_input{
        width: 100%;
        height: 100%;
        font-size: 4vw;
    }
    .letterText{
        width: 85%;
        height: 50vh;
    }
    .text{
        width: 100%;
        height: 100%;
        font-size: 4vw;
    }
    .letterSubmit{
        margin: 5vw 7.5vw;
    }
    .submit_button{
        width: 85vw;
        height: 12.5vw;
        font-size: 4vw;
    }
}
/* ------------------------------------------------------- */
</style>
