<template>
  <div class="container">
    <div class="tile is-ancestor is-vertical">
      <div class="tile is-12 is-parent">
        <div class="tile is-child box">
          <p
            class="content has-text-centered"
          >We have come up with what we think is a really good route for the time you are in Canada. You have a bunch of options to choose from on the route. Along the way we will bring you on a virtual trip. All pictures are clickable, and will show you what your choices will look like on your trip.</p>
        </div>
      </div>
      <div class="tile is-parent">
        <div
          class="tile is-child box"
          @click="updateTransportLoadAddons(index)"
          v-for="(transportation, index) in this.$store.state.transportationArray"
          :key="transportation.id"
        >
          <p class="subtitle">I want to travel by {{transportation.transport_method}}</p>
        </div>
      </div>
    </div>
    <hr class="hr">
    <div v-if="toggleState == true">
      <Addon />
    </div>
  </div>
</template>

<script>
import Addon from "./Addon.vue";

export default {
  name: "Transport",
  components: {
    Addon
  },
  data: function() {
    return {
      toggleState: false
    };
  },
  methods: {
    updateTransportLoadAddons: function(index) {
      this.$store.commit(
        "updateQuote",
        this.$store.state.transportationArray[index].transport_method
      );
      document.cookie =
        "transport=" +
        this.$store.state.transportationArray[index].transport_method +
        "";
      this.toggleState = true;
      this.$store.dispatch("requestAddons");
    }
  },
  mounted() {
    this.$store.dispatch("requestTransportation");
  }
};
</script>

<style>
</style>
