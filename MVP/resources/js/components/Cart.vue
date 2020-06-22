<template>
  <div class="container">
    <h1 class="title is-3" style="margin-top: 2rem; display:inline-block;">
      <a class="has-text-primary" href="/cart">Cart</a>
    </h1>
    <p
      class="content has-text-primary"
    >These are the Choices you have made up until now. Press continue to go to payment</p>
    <div class="box">
      <p class="subtitle is-3">The route</p>
      <div v-if="this.$store.state.chosenRoute.length == 1">
        <p class="content">{{this.$store.state.chosenRoute[0].routename}}</p>
        <p class="content">{{this.$store.state.chosenRoute[0].locations}}</p>
        <h4 class="content">{{this.$store.state.chosenRoute[0].price}} CAD</h4>
      </div>
    </div>

    <div class="box">
      <p class="subtitle is-3">Chosen method of transportation</p>
      <div
        v-for="transportation in this.$store.state.chosenTransportation"
        :key="transportation.id"
      >
        {{transportation.transport_method}}
        <span>{{transportation.price}} CAD</span>
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
    </div>
    <div class="level">
      <div class="level-left">
        <button
          class="button is-radiusless"
          @click="togglePrice = true"
        >Continue</button>
      </div>
      <div class="level-right">
        <button
          class="button is-radiusless"
          @click="clearCookies"
        >Clear Cart</button>
      </div>
    </div>
    <div v-if="togglePrice == true">
      <h2 class="subtitle has-text-primary">The final price</h2>
      <h2 class="subtitle has-text-primary">{{this.finalPrice}} CAD</h2>
      <a href="/checkout">
        <button class="button is-radiusless" style="margin-bottom:2rem;">Checkout</button>
      </a>
    </div>
  </div>
</template>

<script>
const axios = require("axios");

export default {
  name: "Cart",
  data: function() {
    return {
      priceArray: [],
      togglePrice: false,
      finalPrice: ""
    };
  },
  methods: {
    clearCookies: function() {
      document.cookie = "addons=; expires=Thu 01 Jan 1990 00:00:00 UTC";
      document.cookie = "transport=; expires=Thu 01 Jan 1990 00:00:00 UTC";
      this.updateCartChoices();
    },
    sumPrices: function() {
      setTimeout(() => {
        this.$store.state.transportationArray.forEach(element => {
          if (element.transport_method == this.getCookie("transport")) {
            this.priceArray.push(element.price);
          }
        });
        this.$store.state.chosenAddons.forEach(element => {
          this.priceArray.push(element.price);
        });
        this.priceArray.push(this.$store.state.chosenRoute[0].price);
        this.finalPrice = this.priceArray.reduce((a, b) => a + b, 0);
      }, 4000);
    },
    updateCartChoices: function() {
      //load the addons based on the cookie
      if (this.getCookie("addons")) {
        var payload = JSON.parse(this.getCookie("addons"));
        this.$store.dispatch("getChosenAddons", payload);
      }

      //load the transportation based on the cookie
      if (this.getCookie("transport")) {
        var payload = this.getCookie("transport");
        this.$store.dispatch("getChosenTransportation", payload);
      }
      //there is only one route, so just request the route from DB
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
  mounted() {
    this.updateCartChoices();
    this.sumPrices();
  }
};
</script>

<style scoped>
.level{
    margin-bottom: 2rem;
}
</style>
