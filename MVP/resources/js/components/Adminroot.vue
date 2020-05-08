<template>
    <div class="container">
        <div class="columns">
            <div class="column is-one-quarter" style="border-right: 1px grey solid; height:100vh; padding:2rem;">
                <aside class="menu">
                    <p class="menu-label">Admin tools</p>
                    <ul class="menu-list">
                        <li><a @click="toggleAddons = true">Addons</a></li>
                        <li><a @click="toggleCarousel = true">Carousel</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column has-text-centered">
                <p class="title has-text-primary">You are logged in as admin!</p>
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
    }
}
</script>

<style>

</style>
