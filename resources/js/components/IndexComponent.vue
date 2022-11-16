<template>
    <div class="planets">
        <div class="planets_cards" v-on:drag="slider">
            <div class="planets_cards__item item">
                <h1>Neptune</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="planets_cards__item item">
                <h1>Neptune</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="planets_cards__item item">
                <h1>Neptune</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="planets_cards__item item">
                <h1>Neptune</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    export default {
        data(){
            return {

            }
        },
        methods:{
            slider(){
                console.log('апдрвыалоп');
            }
        }
    }
</script>

<style scoped>
.planets {
    display: flex;
    justify-content: center;
    width: 87vw;
}
.planets_cards {
    display: flex;
    justify-content: center;
}
.planets_cards__item {
    width: 20vw;
    height: 80vh;
    background-image: url("./images/icons/Model_planet.svg");
    background-repeat: no-repeat;
    box-shadow: 50px 5px 15px rgba(0, 0, 0, 0.25);
    border-radius: 50px;
    display: grid;
    grid-template-rows: 1fr 1fr 1fr;
    margin-left: 5%;
}
.planets_cards__item > h1 {
  font-family: "Lateef",sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 7em;
  color: #ffffff;
  display: flex;
  align-self: flex-end;
  justify-self: center;
  margin-bottom: 0;
  text-transform: capitalize;
  grid-row: 2/3;
}
.planets_cards__item > p {
  font-family: "League Spartan",sans-serif;
  font-style: normal;
  font-weight: 300;
  font-size: 1.2em;
  line-height: 23px;
  letter-spacing: 0.075em;
  color: rgba(255, 255, 255, 0.7);
  justify-self: center;
  width: 80%;
  grid-row: 3/4;
}
.owl-stage {
  width: 100vw;
}
</style>
