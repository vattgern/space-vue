<template>
    <div class="notification">
        <div :class=" 'notification-area ' + this.classes">
            <div class="notification-text">
                {{ this.text }}
            </div>
            <div class="notification-exit">
                <img :src="'/images/icons/close.svg'" 
                    v-on:click="close"
                    alt="">
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: {
            text: String,
            classes: String,
        },
        methods:{
            close(){
                this.$store.state.modalShow = false;
            }
        }
    }
</script>

<style scoped>
    .notification{
        position: absolute;
        left: 50%;
        top: 15%;
        width: 25vw;
        height: 7.5vh;
        transform: translate(-50%,-50%);
        z-index: 999;
    }
    .notification-area{
        width: 100%;
        height: 100%;
        background-color: black;
        border: 2px white solid;
        border-radius: 10px;
        display: flex;
        flex-direction: row;
    }
    .notification-text{
        width: 75%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 1rem;
        font-weight: bold;
        padding: 2.5% 5%;
    }
    .notification-exit{
        width: 25%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        cursor: pointer;
    }
    .notification-exit img{
        width: 75%;
        height: 75%;
    }
    .danger{
        color: brown;
    }
    .auth{
        color: blue;
    }
    @media screen and (max-width: 450px){
        .notification{
            width: 75vw;
            height: 7.5vh;
        }
    }
</style>
