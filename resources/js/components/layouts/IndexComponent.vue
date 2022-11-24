<template>
    <div class="planets">
        <SliderComponent></SliderComponent>
    </div>
</template>
<script>
import SliderComponent from '../SliderComponent.vue';
    export default {
    data() {
        return {

        };
    },
    components: { SliderComponent }
}
</script>

<style scoped>
.planets {
    display: flex;
    justify-content: center;
    width: 100vw;
}
</style>
