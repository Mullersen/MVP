<template>
        <section id="virtualTrip" class="section is-medium has-background-primary">
            <div class="container">
                <h1 class="title is-2">The route</h1>
                <img src="images/routeMap.JPG" alt="">
                <Transport/>
                <div>
                    <Cart/>
                </div>
            </div>
        </section>
</template>

<script>
import Transport from './Transport.vue';
import Addon from './Addon.vue';
import Cart from './Cart.vue';


    export default {
        name: "Root",
        components: {
            Transport,
            Addon,
            Cart,
        },
        data: function(){
            return{
                carouselToggleState: false,
            }
        },
        methods:{

        },
    }
</script>
<style>
#welcomeHero{
    display:none;
}
#canadaTitle{
    font-size:8rem;
}
.carouselImg{
    height:auto;
    width:auto;
    overflow:hidden;
}
#virtualTrip{
    border-bottom: 3px solid #111A2E;
    padding: 3rem 0 1rem 0;
    margin-bottom: 2rem;
}
.navbar-background{
    background-color: #111A2E !important;
}
@media (max-width: 500px){
    #heroWrapper{
        height:50vh !important;
        background-image: url('/images/Norquay-lookout.JPG');
        background-repeat: no-repeat;
        background-size: cover;
    }
    #canadaTitle{
        font-size:3rem;
    }
    #welcomeCarousel{
        display:none;
    }
    #welcomeHero{
        display:inline;
    }
    #heroImg{
        opacity: 0.3;
    }
}
</style>
