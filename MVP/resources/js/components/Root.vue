<template>
    <div>
        <section id="heroWrapper" class="hero is-primary is-fullheight has-carousel">
            <div id="welcomeCarousel" class="hero-carousel">
                <div class="carousel has-background">
                    <img class="carouselImg" src="images/Norquay-lookout.JPG" alt="">
                </div>
                <div class="carousel has-background">
                    <img class="carouselImg" src="images/DSC00170.JPG" alt="">
                </div>
                <div class="carousel has-background">
                    <img class="carouselImg" src="images/DSC00046.JPG" alt="">
                </div>
            </div>
            <div class="hero-head">
                <nav class="navbar is-transparent is-fixed-top" role="navigation" aria-label="main navigation">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="/">
                                <img src="/images/logo_neg.png" alt="Inside Canada: the familiar travel agency" style="max-height:3.25rem">
                            </a>
                            <a role="button" class="navbar-burger is-active" aria-label="menu" aria-expanded="false" data-target="navMenu">
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                            </a>
                        </div>
                        <div id="navMenu" class="navbar-menu has-text-white">
                            <div class="navbar-end">
                                <a class="navbar-item" href="#virtualtrip">Virtual trip</a>
                                <a class="navbar-item" href="#gallery">Gallery</a>
                                <a class="navbar-item" href="#whoAreWe">Who are we</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 id="canadaTitle" class="title has-text-white" >Canada</h1>
                    <button class="button is-radiusless is-dark">Let's take you on a trip!</button>
                </div>
            </div>
        </section>
        <section class="section is-medium has-background-primary">
            <div class="container">
                <div class="columns">
                    <div class="column is-two-thirds">
                        <div class="columns has-text-centered">
                            <h1 id="virtualTrip" class="title is-2"><span class="title is-1 has-text-grey">01</span>   The Virtual Trip</h1>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <figure class="image is-square">
                                    <img src="images/DSC00170.JPG" alt="">
                                </figure>
                            </div>
                            <div class="column">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently w</p>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <figure class="image is-2by3">
                            <img src="images/DSC00170.JPG" alt="The route through the canadian rockies">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <section class="section is-medium has-background-primary">
            <div class="container">
                <h1 class="title is-2">The route</h1>
                <img src="images/routeMap.JPG" alt="">
                <div class="columns">
                    <div class="column">
                        <Car/>
                    </div>
                    <div class="column">
                        <Van/>
                    </div>
                </div>
                <div>
                    <Cart/>
                </div>
            </div>
        </section>
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
