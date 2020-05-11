<template>
  <div>
    <div class="columns">
      <div class="column is-1"></div>
      <div class="column">
        <div
          class="box is-transparent"
          :id="'transportation' + index"
          @click="updateTransportLoadAddons(index)"
          v-for="(transportation, index) in this.$store.state.transportationArray"
          :key="transportation.id"
        >
          <p
            class="subtitle has-text-primary"
          >I want to travel by {{transportation.transport_method}}</p>
        </div>
      </div>
      <div class="column is-1"></div>
    </div>
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
        var alreadyChosen = document.getElementsByClassName("activeTransportation");
        if (alreadyChosen.length > 0) {
            for (var i=0; i <= alreadyChosen.length; i++){
                alreadyChosen[i].classList.remove("activeTransportation");
            }
        }
        var selectedTransportation = document.getElementById("transportation" + index);
        selectedTransportation.classList.add("activeTransportation");

      this.$store.commit(
        "updateChosenTransportation",
        this.$store.state.transportationArray[index].transport_method
      );
      document.cookie =
        "transport=" +
        this.$store.state.transportationArray[index].transport_method;
      this.toggleState = true;

      document.cookie = "route=" + this.$store.state.chosenRoute;
    }
  },
  mounted() {
    this.$store.dispatch("requestTransportation");
    this.$store.dispatch("requestAddons");
  }
};
</script>

<style>
.activeTransportation {
  background: grey;
}
</style>
