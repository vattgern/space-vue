<template>
    <section class="about__block">
        <div class="about__info">
            <div class="info__header">
                <h1>ABOUT_US</h1>
            </div>
            <div class="info__text">
                <p>
                    {{ this.developers[this.sliderIndex].text }}
                </p>
                <p></p>
            </div>
        </div>
        <div class="about__us">
            <div class="us__slider">
                <img class="slider__left" :src="'./images/icons/Left.svg'" v-on:click="sliderLeft" alt="">
                <div class="us__img">
                    <img :src="this.developers[this.sliderIndex].img" alt="">
                </div>
                <img class="slider__right" :src="'./images/icons/Right.svg'" v-on:click="sliderRight" alt="">
            </div>
            <div class="us__info">
                <h2>
                    {{ this.developers[this.sliderIndex].name }}
                </h2>
                <p> {{ this.developers[this.sliderIndex].roles }} </p>
                <ul>
                    <li>
                        <a :href="this.developers[this.sliderIndex].links.telegram">
                            <img :src="'./images/icons/Telegram.svg'" alt="">
                        </a>
                    </li>
                    <li>
                        <a :href="this.developers[this.sliderIndex].links.insta">
                            <img :src="'./images/icons/Instagram.svg'" alt="">
                        </a>
                    </li>
                    <li>
                        <a :href="this.developers[this.sliderIndex].links.vk">
                            <img :src="'./images/icons/VK.svg'" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                sliderIndex: 0,
                developers:[
                    {
                        name: 'Ruslan',
                        img:'./images/avatars/Ruslan.jpg',
                        roles: 'Разработка дизайна',
                        text: "Ruslan Kormeev of the RP-42 group is our project " + 
                                "designer and worked only when creating the design and several blocks",
                        links: {
                            insta: 'нехочу-искать',
                            vk: 'https://vk.com/ck4fandr',
                            telegram: 'нехочу-искать'
                        }
                    },
                    {
                        name: 'Artem',
                        img: './images/avatars/Artem.jpg',
                        roles: 'Разработка FRONT-END',
                        text: 'Kim Artem, our front-end developer, worked tirelessly to deliver the project on time, using Vue JS to build the site, as well as standard HTML and CSS',
                        links: {
                            insta: 'нехочу-искать',
                            vk: 'https://vk.com/haroniv4',
                            telegram: 'нехочу-искать'
                        }
                    },
                    {
                        name: 'Alexander',
                        img: './images/avatars/sasha.jpg',
                        roles: 'Разработка BACK-END',
                        text: 'Alexander back-end developer almost managed to get depressed, especially after he found out that you need to write documentation and various documents',
                        links: {
                            insta: 'нехочу-искать',
                            vk: 'https://vk.com/lidjiev6664587',
                            telegram: 'нехочу-искать'
                        }
                    }
                ]
            }
        },
        methods:{
            sliderLeft(){
                if(this.sliderIndex === 0){
                    this.sliderIndex = 2;
                } else {
                    this.sliderIndex --;
                }
            },
            sliderRight(){
                if(this.sliderIndex === 2){
                    this.sliderIndex = 0;
                } else {
                    this.sliderIndex ++;
                }
            },
        }
    }
</script>

<style scoped>
.about__block{
    width: 100vw;
    height: 80vh;
    display: flex;
    align-items: center;
    flex-direction: row;
}
.about__info{
    width: 53vw;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.info__header{
    width: 100%;
    height: 15vh;
    position: relative;
}
.info__header h1{
    text-align: center;
    font-family: 'Lateef', serif;
    font-weight: 200;
    color: white;
    font-size: 6vw;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
.info__text{
    width: 100%;
}
.info__text p{
    margin: 5% 20%;
    line-height: 2vw;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: rgba(255, 255, 255, 0.7);
    font-size: 1.5vw;
}
.about__us{
    width: 47vw;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.us__slider{
    width: 100%;
    height: 65%;

    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 1rem;
}
.us__img{
    width: 15vw;
    height: 15vw;
    border-radius: 50%;
    background-color: white;
}
.us__img img{
    width: 100%;
    height: 100%;
    border-radius: 50%;

    object-position: center;
    object-fit: cover;
}
.slider__left,
.slider__right{
    cursor: pointer;
    margin: 3.5%;
}
.us__info{
    width: 100%;
    height: 50%;

    display: flex;
    flex-direction: column;
    align-items: center;
}
.us__info *{
    margin: 0;
    padding: 0;
}
.us__info h2{
    font-family: "Jost", sans-serif;
    font-weight: 400;
    font-size: 3rem;
}
.us__info p{
    font-family: "Jost", sans-serif;
    color: rgba(255,255,255,0.7);
    letter-spacing: 0.25vw;
    margin: 2%;
}
.us__info ul{
    list-style: none;
    display: flex;
    flex-direction: row;
    gap: 1.25rem;
}
@media screen and (max-width: 1367px) and (min-width: 1024px) and (orientation: landscape){
    .info__header{
        height: 15vh;
    }
    .info__text p{
        font-size: 1.75vw;
        line-height: 2.75vw;
    }
    .us__img{
        width: 25vw;
        height: 25vw;
    }
    .us__info p{
        font-size: 2vw;
        margin: 5%;
    }
}
@media screen and (max-width: 1367px) and (min-width: 1024px) and (orientation: portrait){
    .about__block{
        width: 100vw;
        display: flex;
        flex-direction: column-reverse;
    }
    .about__us{
        width: 100%;
        color: white;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .us__slider{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }
    .us__img{
        width: 25vw;
        height: 25vw;
    }
    .about__info{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .info__header h1{
        font-size: 9vw;
    }
    .info__text p{
        font-size: 3vw;
        line-height: 4.75vw;
        text-align: center;
    }
}
@media screen and (max-width: 1023px) and (min-width: 768px) and (orientation: portrait){
    .about__block{
        width: 100vw;
        display: flex;
        flex-direction: column-reverse;
    }
    .about__us{
        width: 100%;
        color: white;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .us__slider{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }
    .us__img{
        width: 25vw;
        height: 25vw;
    }
    .about__info{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .info__header h1{
        font-size: 9vw;
    }
    .info__text p{
        font-size: 3vw;
        line-height: 4.75vw;
        position: relative;
        top: -7.5vw;
        text-align: center;
    }
}
@media screen and (max-width: 767px) and (orientation: portrait){
    .about__block{
        width: 100vw;
        display: flex;
        flex-direction: column-reverse;
    }
    .about__us{
        width: 100%;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .us__slider{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }
    .us__img{
        width: 40vw;
        height: 40vw;
    }
    .about__info{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 10vw;
    }
    .info__header h1{
        font-size: 9vw;
        top: 15%;
    }
    .info__text p{
        font-size: 3.75vw;
        line-height: 4.75vw;
        position: relative;
        top: -15vw;
        text-align: center;
    }
}
@media screen and (max-width: 900px) and (orientation: landscape) {
    .info__header h1{
        font-size: 6vw;
    }
    .info__text p{
        font-size: 1.75vw;
        line-height: 2.75vw;
    }
    .us__img{
        width: 25vw;
        height: 25vw;
    }
    .us__info p{
        font-size: 2vw;
        margin: 5%;
    }
}
</style>
