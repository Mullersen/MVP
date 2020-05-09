<template>
  <div class="container">
    <a href="/cart" style="margin-top: 2rem;">
      <h1 class="title is-3 has-text-primary">Cart</h1>
    </a>

    <div class="box">
      <p class="subtitle is-3">The route</p>
      <p id="store" class="content">{{this.$store.state.chosenRoute[0].routename}}</p>
      <p class="content">{{this.$store.state.chosenRoute[0].locations}}</p>
      <h4 class="content">{{this.$store.state.chosenRoute[0].price}} CAD</h4>
    </div>

    <div class="box">
      <p class="subtitle is-3">Chosen method of transportation</p>
      <div v-for="transportation in this.$store.state.transportationArray" :key="transportation.id">
        <p v-if="transportation.transport_method == getCookie('transport')">
          {{transportation.transport_method}}
          <span>{{transportation.price}} CAD</span>
        </p>
      </div>
    </div>

    <div class="box">
      <p class="subtitle is-3">Chosen Addons</p>
      <div id="store">
        <p v-for="addon in this.$store.state.chosenAddons" :key="addon.id">
          {{addon.activity}}
          <span>{{addon.price}} CAD</span>
        </p>
      </div>
    </div>p
    <button>Continue</button>
  </div>
</template>

<script>
const axios = require("axios");

export default {
  name: "Cart",
  data: function() {
    return {
      priceArray: []
    };
  },
  methods: {
    sumPrices: function() {
      this.$store.state.transportationArray.forEach(element => {
          console.log(element.transport_method);
        if (element.transport_method == this.getCookie("transport")) {
            console.log(element.price);
          this.priceArray.push(element.price);
        }
      });
      this.$store.state.chosenAddons.forEach(element => {
        this.priceArray.push(element.price);
      });
      this.priceArray.push(this.$store.state.chosenRoute[0].price);
      console.log(this.priceArray);
      var sum = this.priceArray.reduce((a, b)=> a+ b, 0);
      console.log(sum);
    },
    updateCartChoices: function() {
      setInterval(() => {
        var payload = JSON.parse(this.getCookie("addons"));
        this.$store.dispatch("getChosenAddons", payload);
      }, 3000);
      this.$store.dispatch("requestTransportation");
      this.$store.dispatch("requestRoutes");
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
    }
  },
  beforeMount() {
    this.updateCartChoices();
  },
  mounted(){
    this.sumPrices();
  }
};
</script>

<style>
</style>
