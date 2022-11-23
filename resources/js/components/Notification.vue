<template>
    <div class="notification">
        <div :class=" 'notification-area ' + this.classes">
            <div class="notification-text">
                {{ this.text }}
            </div>
            <div class="notification-exit">
                закрыть
            </div>
        </div>
    </div>
</template>

<script setup>
    props: {
        text: String;
        classes: String;
    }
</script>

<style scoped>
    .notification{
        position: absolute;
        left: 50%;
        top: 20%;
        width: 25vw;
        height: 7.5vh;
        transform: translate(-50%,-50%);
        z-index: 999;
    }
    .notification-area{
        width: 100%;
        height: 100%;
        background-color: white;
        border-radius: 20px;
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
    }
    .notification-exit{
        width: 25%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 1rem;
        font-weight: 300;
        cursor: pointer;
    }
    .danger{
        
    }
</style>
