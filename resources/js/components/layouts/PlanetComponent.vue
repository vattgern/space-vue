<template>
    <div class="planet">
        <div class="planet_block" id="sideNav">
            <div class="sideNavigation" v-on:click="planetCountChange">
                <div class="lines">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="countPage">
                    <p>{{ '0' + (this.planetCount + 1) }}</p>
                    <p>{{ '0' + (this.planets.length) }}</p>
                </div>
            </div>
            <img :src="'/models/mars/textures/Material.001_baseColor.jpeg'" class="textures" alt="qwerty">
        </div>
        <div class="planet_block" id="aboutPlanet">
            <div class="planet_block__item">
                <div class="planet_block__p" v-on:click="planetCountChange">
                    <p>{{  '0' + (this.planetCount + 1) }}</p>
                    <hr>
                    <p>{{ '0' + (this.planets.length) }}</p>
                </div>
                <h1>{{ this.planets[this.planetCount].name }}</h1>
                <p> {{ this.planets[this.planetCount].text }} </p>
                <img :src="'./images/icons/plus.svg'" alt="">
            </div>
        </div>
        <div class="planet_block planet_view"></div>
    </div>
</template>
<script>
import * as THREE from 'three';
import {OrbitControls} from 'three/examples/jsm/controls/OrbitControls';
import {GLTFLoader} from 'three/examples/jsm/loaders/GLTFLoader.js';
export default {
    name: "PlanetComponent",
    data(){
        return{
            planetCount: this.$route.params['id'] - 1,
            planets: [
                {
                    url: '/models/mercury/scene.gltf',
                    name: 'Mercury',
                    text: 'Mercury is the first planet from the Sun and the smallest planet in the solar system. ' +
                        'This is one of the most extreme worlds. It received its name in honor of the messenger of the Roman gods. ' +
                        'It can be found without the use of instruments, therefore Mercury has been noted in many cultures and myths. ' +
                        'However, it is also a very mysterious object. Mercury can be observed in the morning and evening in the sky, ' +
                        'and the planet itself has its own phases.'
                },
                {
                    url: '/models/venus/scene.gltf',
                    name: 'Venus',
                    text: 'Venus is the second planet from the Sun and the hottest planet in the solar system. ' +
                        'For the ancient people, Venus was a constant companion. This is an evening star and the brightest neighbor, ' +
                        'which has been observed for thousands of years after the recognition of planetary nature. ' +
                        'That is why it appears in mythology and was noted in many cultures and peoples. ' +
                        'With each century, interest increased, and these observations helped to understand the structure of our system.'
                },
                {
                    url: '/models/earth/scene.gltf',
                    name: 'Earth',
                    text: 'Of course we love our planet. And not only because it is a home, but also because ' +
                        'it is a unique place in the solar system and the Universe, because so far we know only life on Earth. ' +
                        'Lives in the inner part of the system and occupies a place between Venus and Maps. ' +
                        'The planet Earth is also called the Blue Planet, Gaia, the World and Terpa, which reflects its role for ' +
                        'each people in the historical plan.'
                },
                {
                    url: '/models/mars/scene.gltf',
                    name: 'Mars',
                    text: 'Maps is the fourth planet from the Sun and the most similar to Earth in the solar system. ' +
                        'We know our neighbor also by the second name - "Red Planet". He received his name in honor of the ' +
                        'god of war from the Romans. The point is its red color, created by iron oxide. Every few years, the ' +
                        'planet is closest to us and can be found in the night sky. Its periodic appearance led to the fact that ' +
                        'the planet was displayed in many myths and legends. And the external menacing appearance became the cause ' +
                        'of fear in front of the planet.'
                },
                {
                    url: '/models/jupiter/scene.gltf',
                    name: 'Jupiter',
                    text: 'Jupiter fascinated observers 400 years ago, when it was possible to see it through the first telescopes. ' +
                        'This is a beautiful gas giant with swirling clouds, a mysterious spot, a family of satellites and many features. ' +
                        'Most impressive is its scale. In terms of mass, volume and area, the planet occupies an honorable first place in the solar system. ' +
                        'Even ancient people knew about its existence, therefore Jupiter was noted in many cultures.'
                },
                {
                    url: '/models/saturn/scene.gltf',
                    name: 'Saturn',
                    text: 'Saturn is the sixth planet from the Sun and possibly the most beautiful object in the solar system. ' +
                        'This is the most distant planet from the star, which can be found from the Earth without using a telescope or binoculars. ' +
                        'So they have known about its existence for a long time. Before you is one of the four gas giants, located 6th in order from the Sun.'
                },
                {
                    url: '/models/uranus/scene.gltf',
                    name: 'Uranus',
                    text: 'Uranus is the seventh planet from the Sun and the third largest planet in the solar system after Jupiter and Saturn. ' +
                        'Has a collection of satellites and a ring system. Although it can be found without the use of magnifying devices, ' +
                        'the planetary status was revealed only in the 18th century.'
                },
                {
                    url: '/models/neptune/scene.gltf',
                    name: 'Neptune',
                    text: 'Neptune is the eighth from the Sun and the most distant planet in the solar system. ' +
                        'This is a gas giant and a representative of the category of solar planets of the outer system. ' +
                        'Pluto flew out of the planetary list, so Neptune closes the chain. It cannot be found without devices, ' +
                        'so it was found relatively recently. In a close approach, they observed only once during the ' +
                        'flight of the Boyager-2 apparatus in 1989.'
                }
            ],
        }
    },
    mounted(){
        this.initPlanet();
    },
    methods:{
        planetCountChange(){
            if(this.planetCount === this.planets.length - 1){
                this.planetCount = 0;
            } else {
                this.planetCount++;
            }
            document.querySelector('.planet_view > canvas').remove();
            this.initPlanet();
        },
        initPlanet(){
            console.log(this.planets[this.planetCount].url);
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x000000);
            const container = document.querySelector('.planet_view');
		    const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 10000 );
		    const renderer = new THREE.WebGLRenderer();
            if(window.outerWidth < 1024){
                renderer.setSize( container.clientWidth, container.clientHeight);
            } else {
                renderer.setSize( container.clientWidth + 250, container.clientHeight - 100);
            }
            if(window.outerWidth < 767) {
                renderer.setSize( container.clientWidth, container.clientHeight);
            }
	        document.querySelector('.planet_view').appendChild( renderer.domElement );

            // --------------------------------------------------
            const light = new THREE.AmbientLight(0xffffff, 0.8);
            scene.add(light);
            const light2 = new THREE.HemisphereLight(0xffffff, 1);
            scene.add(light2);
            // --------------------------------------------------
            // --------------------------------------------------
            let controls = new OrbitControls(camera, renderer.domElement);
            controls.addEventListener('change',renderer);

            if(window.outerWidth < 1024){
                camera.position.set(1,1,2);
            }
            if(window.outerWidth < 767) {
                camera.position.set(1,1,3);
            }
            if(this.planets[this.planetCount].name !== 'Mars'){
                if(this.planets[this.planetCount].name === 'Saturn' || this.planets[this.planetCount].name === 'Uranus'){
                    camera.position.set(150,150,150);
                } else {
                    camera.position.set(100,100,100)
                }
            } else {
              camera.position.set(1,1,1);
            }
            // --------------------------------------------------
            // --------------------------------------------------
            const loader = new GLTFLoader();
            loader.load(this.planets[this.planetCount].url, (gltf) => {
                let planet = gltf.scene.children[0];
                let box3 = new THREE.Box3().setFromObject(planet);
                let center = new THREE.Vector3();
                box3.getCenter(center);
                planet.position.sub(center);
                scene.add(gltf.scene);
            });
            // --------------------------------------------------
	        function animate() {
              requestAnimationFrame( animate );
	        	renderer.render( scene, camera );
	        };
	    	animate();
        }
    }
}
</script>
<style scoped>
.planet {
    display: flex;
    height: 85vh;
    width: 100vw;
}
.planet_view{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}
.planet_view canvas{
    position: absolute;
}
.planet_block {
    display: flex;
}
/* ------------------------------------------ */
/* Боковые цифры */
.sideNavigation{
    width: 85%;
    height: 25vh;
    color: white;
    display: flex;
    flex-direction: row;
}
.lines{
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
}
.line{
    width: 20px;
    height: 3px;
    background: white;
    border-radius: 20px;
}
.countPage{
    width: 50%;
    height: 95%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin: 2.5% 0;
}
.countPage p{
    font-family: "Jost", sans-serif;
    font-size: 1.25vw;
}
.planet_block:nth-child(1) {
    width: 25%;
    justify-content: flex-end;
    align-items: center;
    display: flex;
    flex-direction: column;
}
.planet_block:nth-child(1) > img:nth-child(2) {
    width: 90%;
    margin-top: 15%;
}
.textures{
    opacity: 0;
}
/* ------------------------------------------ */
.planet_block:nth-child(2) {
    width: 25%;
    border: solid rgba(255, 255, 255, 0.19);
    border-width: 0 1px;
    position: relative;
    z-index: 5;
    background-color: rgba(0, 0, 0, 0.3);
}

.planet_block:nth-child(3) {
    width: 60%;
}
.planet_block__p {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;

    width: 35%;
    margin-right: 50%;
}
.planet_block__p p{
    font-family: "Jost", sans-serif;
    font-weight: 400;
    font-size: 1.2vw;
    line-height: 29px;
    color: #ffffff;
}
.planet_block__p > hr {
    transform: rotate(90deg);
}
/* -------------------------------- */
/* -------------------------------- */
/* Инфа о планете и планета */
.planet_block__item {
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
}
.planet_block__item > h1 {
    font-size: 9rem;
    font-weight: 300;
    color: #ffffff;
    position: relative;
    left: 5%;
    margin: 0;
}
.planet_block__item > p {
    font-family: "League Spartan", sans-serif;
    font-weight: 300;
    font-size: 1.1em;
    line-height: 23px;
    letter-spacing: 0.075em;
    color: rgba(255, 255, 255, 0.7);
    width: 85%;
    margin-top: 10%;
    margin-right: 5%;
}
.planet_block__item > img {
    margin-left: 60%;
}
/* -------------------------------- */
@media screen and (max-width: 1270px) and (min-width: 1024px){
    .countPage p{
        font-size: 1.5vw;
    }
    .planet_block__p p{
        font-size: 1.5vw;
    }
    .textures{
        width: 100%;
        height: 50%;
        border: 2px white solid;
    }
}
@media screen and (max-width: 1023px) and (min-width: 768px){
    .planet{
        width: 100vw;
        height: 100%;
        flex-direction: column-reverse;
        align-items: flex-end;
    }
    .planet_view{
        width: 100vw;
        height: 50vh;
        position: relative;
    }
    /* -------------------------- */
    /* Боковая навигация */
    #sideNav{
        position: absolute;
        top: 0;
        left: 0;
        width: 30vw;
        height: 62.5%;

        display: flex;
        justify-content: center;
    }
    .textures{
        display: none;
    }
    .countPage p{
        font-size: 2vw;
    }
    /* -------------------------- */
    /* -------------------------- */
    #aboutPlanet{
        width: 100vw;
    }
    .planet_block__p{
        margin-right: 65%;
    }
    .planet_block__p p{
        font-size: 2vw;
    }
    .planet_block__item h1{
        font-size: 5rem;
        padding: 0;
        margin: 0;
    }
    .planet_block__item p{
        font-size: 2vw;
        margin: 0;
    }
    /* -------------------------- */
}
@media screen and (max-width: 767px){
    .planet{
        width: 100vw;
        height: 100%;
        flex-direction: column-reverse;
        align-items: center;
    }
    .planet_view{
        width: 100vw;
        height: 45vh;
    }
    /* -------------------------- */
    /* Боковая навигация */
    #sideNav{
        display: none;
    }
    .textures{
        display: none;
    }
    .countPage p{
        font-size: 2vw;
    }
    /* -------------------------- */
    /* -------------------------- */
    #aboutPlanet{
        width: 100vw;
    }
    #aboutPlanet{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .planet_block__p{
        margin: 0;
    }
    .planet_block__p p{
        font-size: 2rem;
    }
    .planet_block__item h1{
        font-size: 3rem;
        width: 100%;
        margin-left: -10%;
        text-align: center;
    }
    .planet_block__item p{
        font-size: 4vw;
        margin: 0;
    }
    /* -------------------------- */
}
</style>
