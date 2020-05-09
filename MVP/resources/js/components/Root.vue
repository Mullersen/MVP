<template>
  <div>
    <section id="virtualTrip" class="section is-medium has-background-primary">
      <div class="container">
        <div class="columns">
          <div class="column">
            <h1 class="title is-2">The route</h1>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <figure class="image is-3by2">
              <img src="images/routeMap.JPG" alt="The shortest of Inside Canadas routes" />
            </figure>
          </div>
        </div>
        <hr class="hr" />
        <Transport />
        <hr class="hr" />
      </div>
    </section>
    <!-- cart-slider -->
    <div id="quickviewDefault" class="quickview">
      <header class="quickview-header">
        <p class="title has-text-primary">Quickview your Cart</p>
        <span class="delete" data-dismiss="quickview"></span>
      </header>

      <div class="quickview-body">
        <div class="quickview-block">
          <Cart />
        </div>
      </div>

      <footer class="quickview-footer"></footer>
    </div>
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
  methods: {}
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
#virtualTrip {
  border-bottom: 3px solid #111a2e;
  padding: 3rem 0 1rem 0;
  margin-bottom: 2rem;
}
.navbar-background {
  background-color: #111a2e !important;
}
@media (max-width: 500px) {
  #heroWrapper {
    height: 50vh !important;
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
}
</style>
