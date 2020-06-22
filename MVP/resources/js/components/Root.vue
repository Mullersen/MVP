<template>
  <div>
    <section id="virtualTrip" class="section is-small has-background-primary">
      <div class="container">
        <div class="columns">
          <div class="column is-4">
            <h1 class="title is-2">Dream away with us</h1>
            <!-- <div class="content">
                <ol type="1" v-if="this.$store.state.chosenRoute.length == 1">
                    <li v-for="(routeDestinations, index) in this.$store.state.chosenRoute" :key="index" >{{routeDestinations.locations}}</li>
                </ol>
            </div> -->
            <p
            class="content"
          >This is our proposed route. Along the way we have a bunch of options and insider tips we will let you in on, to get the best out of your trip!</p>
          </div>
          <div class="column is-8">
              <img src="images/routeMap.JPG" alt="The shortest of Inside Canadas routes" />
          </div>
        </div>
      </div>
    </section>
    <Transport/>
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

</style>
