<template>
  <div>
    <section id="virtualTrip" class="section is-medium has-background-primary">
      <div class="container">
        <div class="columns">
          <div class="column">
            <h1 class="title is-2 has-text-centered">The route</h1>
            <h2 v-if="this.$store.state.chosenRoute.length == 1" class="content has-text-centered">{{this.$store.state.chosenRoute[0].locations}}</h2>
            <p
            class="content has-text-centered"
          >This is our proposed route. Along the way we have a bunch of options and insider tips we will let you in on, to get the best out of your trip!</p>
          </div>
        </div>
        <div class="columns">
          <div class="column is-1"></div>
          <div class="column">
            <figure class="image is-3by2">
              <img src="images/routeMap.JPG" alt="The shortest of Inside Canadas routes" />
            </figure>
          </div>
          <div class="column is-1"></div>
        </div>
        <Transport />
      </div>
    </section>
  </div>
</template>

<script>
import Transport from "./Transport.vue";
import Cart from "./Cart.vue";
import Adminroot from "./Adminroot.vue";

export default {
  name: "Root",
  components: {
    Transport,
    Cart,
    Adminroot
  },
  data: function() {
    return {
      carouselToggleState: false
    };
  },
  beforeMount() {
    this.$store.dispatch("requestRoutes");
  }
};
</script>
<style>
#welcomeHero {
  display: none;
}
#canadaTitle {
  font-size: 8rem;
}
.carouselImg {
  height: auto;
  width: auto;
  overflow: hidden;
}
.navbar-background {
  background-color: #111a2e !important;
}
.underlined {
  text-decoration: underline;
  text-decoration-color: #da6e23;
}
@media (max-width: 1025px) {
  #heroWrapper {
    background-image: url("/images/Norquay-lookout.JPG");
    background-repeat: no-repeat;
    background-size: cover;
  }
  #canadaTitle {
    font-size: 3rem;
  }
  #welcomeCarousel {
    display: none;
  }
  #welcomeHero {
    display: inline;
  }
  #heroImg {
    opacity: 0.3;
  }
  #firstImage{
    display: none;
  }
}
</style>
