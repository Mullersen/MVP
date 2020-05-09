<template>
    <div class="container">
        <div class="columns">
            <div class="column is-one-quarter" style="padding:2rem;">
                <aside class="menu">
                    <p class="menu-label">Admin tools</p>
                    <ul class="menu-list">
                        <li><a @click="addonToggle()">Addons</a></li>
                        <li><a @click="carouselToggle()">Carousel</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column has-text-centered" >
                <p class="title has-text-primary" style="padding-top: 1rem;">You are logged in as admin!</p>
                <div v-if="toggleAddons == true">
                    <Adminaddon/>
                </div>
                <div v-if="toggleCarousel == true">
                    <Admincarousel/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Adminaddon from "./Adminaddon.vue";
import Admincarousel from "./Admincarousel.vue";

export default {
    name: "AdminRoot",
    components: {
        Adminaddon,
        Admincarousel,
    },
    data: function() {
        return{
        toggleCarousel: false,
        toggleAddons: false,
        }
    },
    methods:{
        addonToggle: function(){
            if(this.toggleCarousel == true){
                this.toggleCarousel = false;
            }
            this.toggleAddons = true;
        },
        carouselToggle: function(){
            if(this.toggleAddons == true){
                this.toggleAddons = false;
            }
            this.toggleCarousel = true;
        }
    }
}
</script>

<style>

</style>
