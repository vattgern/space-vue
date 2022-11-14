<template>

<div class="admin-users">
        <div class="admin-users-header">
            <h2>Letters</h2>
        </div>
        <div class="admin-users-main">
            <img :src="'./images/icons/Left-white.svg'"
                class="left"
                alt="">
            <img :src="'./images/icons/Right-white.svg'"
                alt=""

                class="right">
            <div class="slider" id="slider">
                <div class="obshi_div">
                <h1 class="h1_mail">_E-MAIL:</h1>
                <p class="p1_mail">sahsawot68@mail.ru</p>
                <h1 class="h1_letter">_LETTER:</h1>
                <div class="div_v_dive">
                    <p class="text_v_dive">et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                        similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                        rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque
                        nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                        repellendus.
                    </p>
                </div>
                <button class="approve">APPROVE</button>
                <button class="but_x">X</button>
                </div>
                <div class="obshi_div">
                    <h1 class="h1_mail">_E-MAIL:</h1>
                    <p class="p1_mail">sahsawot68@mail.ru</p>
                    <h1 class="h1_letter">_LETTER:</h1>
                    <div class="div_v_dive">
                        <p class="text_v_dive">et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                            similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                            rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque
                            nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                            repellendus.
                        </p>
                    </div>
                    <button class="approve">APPROVE</button>
                    <button class="but_x">X</button>
                </div>
                <div class="obshi_div">
                    <h1 class="h1_mail">_E-MAIL:</h1>
                    <p class="p1_mail">sahsawot68@mail.ru</p>
                    <h1 class="h1_letter">_LETTER:</h1>
                    <div class="div_v_dive">
                        <p class="text_v_dive">et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                            similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                            rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque
                            nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                            repellendus.
                        </p>
                    </div>
                    <button class="approve">APPROVE</button>
                    <button class="but_x">X</button>
                </div>
                <div class="obshi_div">
                    <h1 class="h1_mail">_E-MAIL:</h1>
                    <p class="p1_mail">sahsawot68@mail.ru</p>
                    <h1 class="h1_letter">_LETTER:</h1>
                    <div class="div_v_dive">
                        <p class="text_v_dive">et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                            similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                            rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque
                            nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                            repellendus.
                        </p>
                    </div>
                    <button class="approve">APPROVE</button>
                    <button class="but_x">X</button>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
import api from '../../api';
    export default {
        data(){
            return{
                count: 4,
            }
        },
        methods:{

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
        width: 200%;
        display: flex;
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
    .obshi_div{
        margin-left: 8vw;
        margin-top: 4vw;
        border: 2px solid ;
        width: 24vw;
        height: 35vw;
    }

    .h1_mail{
        width: 4.5vw;
        margin-top: 2vw;
        margin-left: 1.5vw;
        font-size: 1vw;
        font-family: sans-serif;
    }

    .p1_mail{
        margin-top: -1.9vw;
        margin-left: 7vw;
        font-size: 0.8vw;
        font-family: sans-serif;
    }

    .h1_letter{
        width: 4.5vw;
        margin-top: 2vw;
        margin-left: 1.5vw;
        font-size: 1vw;
        font-family: sans-serif;
    }

    .div_v_dive{
        margin-left: 1.5vw;
        border: 1px solid ;
        width: 21vw;
        height: 23vw;
    }

    .text_v_dive{
        margin-left: 1vw;
        width: 19vw;
        font-size: 1vw;
        font-family: sans-serif;
    }

    .approve{
        border: 1px solid white;
        color: white;
        background-color: #000;
        margin-top: 1.2vw;
        margin-left: 1.5vw;
        height: 2.5vw;
        width: 17vw;
    }

    .but_x{
        border: 1px solid white;
        color: white;
        background-color: #000;
        margin-left: 1.2vw;
        width: 3vw;
        height: 2.5vw;
    }

    .obshi_div2{
        margin-left: 40vw;
        margin-top: -35.2vw;
        border: 2px solid ;
        width: 24vw;
        height: 35vw;
    }


</style>
