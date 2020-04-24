<template>
    <div>
        <h1>Thisis Root</h1>

    </div>
</template>

<script>
import Car from './Car.vue';
import Van from './Van.vue';
import Addons from './Addons.vue';
import Cart from './Cart.vue';


    export default {
        name: "Root",
        components: {
            Car,
            Van,
            Addons,
            Cart,
        },
        mounted(){

        }
    }
</script>
