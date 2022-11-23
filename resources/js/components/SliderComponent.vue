<template>
    <div class="carousel">
        <div class="carousel--wrap">
          <div class="carousel--item" v-for="(planet, index) of planets">
            <router-link :to="{ name:'planet', params: { id: index + 1 } }" class="planets_cards__item">
              <!-- <img :src="'./images/icons/Model_planet.svg'" alt="qwerty" /> -->
              <h1>{{ planet.name}}</h1>
              <p>
                {{ planet.text }}
              </p>
            </router-link>
          </div>
        </div>
        <div class="carousel--progress">
            <div class="carousel--progress-bar"></div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
          planets: [
            {
              name: 'Mercury',
              text: 'Mercury is the first planet from the Sun and the smallest planet in the solar system. ' +
                'This is one of the most extreme worlds. It received its name in honor of the messenger of the Roman gods. '
            },
            {
              name: 'Venus',
              text: 'Venus is the second planet from the Sun and the hottest planet in the solar system. ' +
                'For the ancient people, Venus was a constant companion.'
            },
            {
              name: 'Earth',
              text: 'Of course we love our planet. And not only because it is a home, but also because ' +
                'it is a unique place in the solar system and the Universe, because so far we know only life on Earth.' 
            },
            {
              name: 'Mars',
              text: 'Maps is the fourth planet from the Sun and the most similar to Earth in the solar system. ' +
                'We know our neighbor also by the second name - "Red Planet".'
            },
            {
              name: 'Jupiter',
              text: 'Jupiter fascinated observers 400 years ago, when it was possible to see it through the first telescopes. ' +
                'This is a beautiful gas giant with swirling clouds, a mysterious spot, a family of satellites and many features. '
            },
            {
              name: 'Saturn',
              text: 'Saturn is the sixth planet from the Sun and possibly the most beautiful object in the solar system. ' +
                'This is the most distant planet from the star, which can be found from the Earth without using a telescope or binoculars. '
            },
            {
              name: 'Uranus',
              text: 'Uranus is the seventh planet from the Sun and the third largest planet in the solar system after Jupiter and Saturn. ' +
                'Has a collection of satellites and a ring system. Although it can be found without the use of magnifying devices, '
            },
            {
              name: 'Neptune',
              text: 'Neptune is the eighth from the Sun and the most distant planet in the solar system. ' +
                'This is a gas giant and a representative of the category of solar planets of the outer system. '
            }
          ]
        }
    },
    mounted() {
        const lerp = (f0, f1, t) => (1 - t) * f0 + t * f1;
        const clamp = (val, min, max) => Math.max(min, Math.min(val, max));

        class DragScroll {
            constructor(obj) {
                this.$el = document.querySelector(obj.el);
                this.$wrap = this.$el.querySelector(obj.wrap);
                this.$items = this.$el.querySelectorAll(obj.item);
                this.$bar = this.$el.querySelector(obj.bar);
                this.init();
            }
            init() {
                this.progress = 0;
                this.speed = 0;
                this.oldX = 0;
                this.x = 0;
                this.playrate = 0;
                //
                this.bindings();
                this.events();
                this.calculate();
                this.raf();
            }
            bindings() {
                ['events','calculate','raf','handleWheel',
                'move','raf','handleTouchStart','handleTouchMove',
                'handleTouchEnd'].
                forEach(i => {this[i] = this[i].bind(this);});
            }
            calculate() {
                this.progress = 0;
                this.wrapWidth = this.$items[0].clientWidth * (this.$items.length + 1);
                this.$wrap.style.width = `${this.wrapWidth}px`;
                this.maxScroll = this.wrapWidth - this.$el.clientWidth;
            }
            handleWheel(e) {
                this.progress += e.deltaY;
                this.move();
            }
            handleTouchStart(e) {
                e.preventDefault();
                this.dragging = true;
                this.startX = e.clientX || e.touches[0].clientX;
                this.$el.classList.add('dragging');
            }
            handleTouchMove(e) {
                if (!this.dragging) return false;
                const x = e.clientX || e.touches[0].clientX;
                this.progress += (this.startX - x) * 2.5;
                this.startX = x;
                this.move();
            }
            handleTouchEnd() {
                this.dragging = false;
                this.$el.classList.remove('dragging');
            }
            move() {
                this.progress = clamp(this.progress, 0, this.maxScroll);
            }
            events() {
                window.addEventListener('resize', this.calculate);
                window.addEventListener('wheel', this.handleWheel);
                //
                this.$el.addEventListener('touchstart', this.handleTouchStart);
                window.addEventListener('touchmove', this.handleTouchMove);
                window.addEventListener('touchend', this.handleTouchEnd);
                //
                window.addEventListener('mousedown', this.handleTouchStart);
                window.addEventListener('mousemove', this.handleTouchMove);
                window.addEventListener('mouseup', this.handleTouchEnd);
                document.body.addEventListener('mouseleave', this.handleTouchEnd);
            }
            raf() {
                this.x = lerp(this.x, this.progress, 0.1);
                this.playrate = this.x / this.maxScroll;

                this.$wrap.style.transform = `translateX(${-this.x}px)`;
                this.$bar.style.transform = `scaleX(${.18 + this.playrate * .82})`;

                this.speed = Math.min(100, this.oldX - this.x);
                this.oldX = this.x;

                this.scale = lerp(this.scale, this.speed, 0.1);
                this.$items.forEach(i => {
                i.style.transform = `scale(${1 - Math.abs(this.speed) * 0.002})`;
                //i.querySelector('img').style.transform = `scaleX(${1 + Math.abs(this.speed) * 0.004})`;
                });
            }
        }
        /*--------------------
        Instances
        --------------------*/
        const scroll = new DragScroll({
            el: '.carousel',
            wrap: '.carousel--wrap',
            item: '.carousel--item',
            bar: '.carousel--progress-bar' 
        });
        /*--------------------
        One raf to rule em all
        --------------------*/
        const raf = () => {
            requestAnimationFrame(raf);
            scroll.raf();
        };
        raf();
    },
}
</script>
<style>
/* body {
        height: 100vh;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Orelo-sw-bi", serif;
        background: #000;
    } */
    .carousel {
        width: 100%;
        cursor: -webkit-grab;
        cursor: grab;
    }
    .carousel.dragging {
        cursor: -webkit-grabbing;
        cursor: grabbing;
    }
    .carousel--wrap {
        white-space: nowrap;
    }
    .carousel--item {

        display: inline-block;
        margin: 0 1vw;
        width: 20vw;
        height: 80vh;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .carousel--progress {
        position: fixed;
        z-index: 2;
        pointer-events: none;
        bottom: 2vw;
        width: 20vw;
        left: 3vw;
        height: 1px;
        background: rgba(255, 255, 255, 0.2);
    }
    
    .carousel--progress-bar {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        transform: scaleX(0);
        transform-origin: 0% 0%;
    }
  .planets_cards__item {
    width: 100%;
    height: 100%;

    background-image: url("../images/icons/Model_planet.svg");
    background-repeat: no-repeat;
    background-position: top right;
    background-size: 100%;

    box-shadow: 50px 5px 15px rgba(0, 0, 0, 0.25);
    border-radius: 50px;

    display: flex;
    flex-direction: column;
    white-space: pre-wrap;
    text-decoration: none;
  }
  .planets_cards__item > h1 {
    width: 100%;
    height: 65%;

    display: flex;
    justify-content: center;
    align-items: flex-end;

    font-style: normal;
    font-weight: 300;
    font-size: 7em;
    color: #ffffff;
    text-transform: capitalize; 
  }
  .planets_cards__item > p {
    font-family: "League Spartan";
    font-style: normal;
    font-weight: 300;
    font-size: 1.2em;
    line-height: 23px;
    letter-spacing: 0.075em;
    color: rgba(255, 255, 255, 0.7);

    display: flex;
    justify-content: center;
    align-items: center;

    width: 100%;
    height: 35%;
  }
</style>