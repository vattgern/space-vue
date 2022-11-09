<template>
    <section class="about__block">
        <div class="about__info">
            <div class="info__header">
                <h1>ABOUT_US</h1>
            </div>
            <div class="info__text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="about__us">
            <div class="us__slider">
                <img class="slider__left" :src="'./images/icons/Left.svg'" v-on:click="sliderLeft">
                <div class="us__img">
                    <img :src="this.developers[this.sliderIndex].img" alt="">
                </div>
                <img class="slider__right" :src="'./images/icons/Right.svg'" v-on:click="sliderRight">
            </div>
            <div class="us__info">
                <h2>
                    {{ this.developers[this.sliderIndex].name }}
                </h2>
                <p> {{ this.developers[this.sliderIndex].roles }} </p>
                <ul>
                    <li>
                        <a href="#">
                            <img :src="'./images/icons/Telegram.svg'" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img :src="'./images/icons/Instagram.svg'" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
                    },
                    {
                        name: 'Artem',
                        img: './images/avatars/Artem.jpg',
                        roles: 'Разработка FRONT-END'
                    },
                    {
                        name: 'Alexander',
                        img: './images/avatars/Alexander.jpg',
                        roles: 'Разработка BACK-END'
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
    height: 87.5vh;

    display: flex;
    flex-direction: row;
}
.about__info{
    width: 53vw;
    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
}
.info__header{
    height: 25%;
    width: 100%;

    display: flex;
    justify-content: center;
    align-items: center;
}
.info__header h1{
    margin-left: 5%;

    font-family: 'Lateef', serif;
    font-weight: 200;
    color: white;
    font-size: 7.5vw;
}
.info__text{
    height: 75%;
    width: 100%;
}
.info__text p{
    margin: 2.5% 25%;
    line-height: 2.75vh;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: rgba(255, 255, 255, 0.7);
}
.about__us{
    height: 100%;
    width: 47vw;
    color: white;

    display: flex;
    flex-direction: column;
    align-items: center;
}
.us__slider{
    width: 100%;
    height: 50%;

    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 1rem;
}
.us__img{
    width: 30%;
    height: 75%;
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
@media screen and (max-width: 425px){
    .about__block{
        flex-direction: column-reverse;
    }
    .about__us{
        width: 100%;
        height: 50vh;
    }
    .about__info{
        width: 100%;
        height: 50vh;
    }
    .us__img{
        width: 35%;
        height: 75%;
    }
    .us__info p{
        font-size: 1.35rem;
    }
    .info__text p{
        margin: 0 2.5%;
        text-align: center;
    }
}
@media screen and (max-width:375px){
    .us__img{
        width: 46%;
        height: 75%;
    }
    .info__text p{
        font-size: 14px;
    }
}
</style>
