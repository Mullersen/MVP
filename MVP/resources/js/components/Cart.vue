<template>
  <div>
    <p class="title is-3">Cart</p>
    <!-- Show the transportation dynamically if on the main page -->
    <p class="subtitle is-3">Chosen method of transportation</p>
    <p id="store" v-if="this.$store.state.transportation == !''">{{this.$store.state.transportation}}</p>
    <p id="cookie" v-else>{{getCookie("transport")}}</p>


    <!-- <div v-for="transportation in this.$store.state.transportationArray" :key="transportation.id">
      <p v-if="transportation.transport_method == transportationMethod">{{transportation.price}} CAD</p>
    </div> -->

    <p class="subtitle is-3">Chosen Addons</p>
    <div id="state">
        <p v-for="addon in this.$store.state.chosenAddons" :key="addon">{{addon}}</p>
    </div>
  </div>
</template>

<script>
const axios = require('axios');

export default {
  name: "Cart",
  data: function() {
    return {
      transportationMethod: "",
    };
  },
  methods: {
    getAddons: function() {
        setInterval(() =>{
            var payload = JSON.parse(this.getCookie('addons'));
            this.$store.dispatch('getChosenAddons', payload);
        }, 3000);
    },
    getCookie: function(param) {
      var name = param + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(";");
      for (var i = 0; i < ca.length; i++) {
        var cookie = ca[i];
        while (cookie.charAt(0) == " ") {
          cookie = cookie.substring(1);
        }
        if (cookie.indexOf(param) == 0) {
          return cookie.substring(param.length + 1, cookie.length);
        }
      }
      return "";
      this.$store.dispatch("requestTransportation");
    }
  },
  mounted() {
    this.getAddons();
  }
};
</script>

<style>
</style>
