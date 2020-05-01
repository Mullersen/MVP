<template>
  <div>
      <h2 class="title is-3">Cart</h2>
      <h3 class="subtitle is-3">Chosen method of transportation</h3>
      <h2>{{getCookie("transport")}}</h2>
      <div v-for="transportation in this.$store.state.transportationArray" :key="transportation.id">
          <h2 v-if="transportation.transport_method == this.transportation">{{transportation}}</h2>
      </div>
  </div>
</template>

<script>
export default {
    name:"Cart",
    data: function(){
        return{
            transportation: ""
        }
    },
    methods:{
        getCookie: function(transport){
            var name = transport + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for( var i = 0; i<ca.length; i++){
                var cookie = ca[i];
                while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1);
                }
                if (cookie.indexOf(transport) == 0) {
                    this.$store.dispatch('requestTransportation');
                    this.transportation = cookie.substring(transport.length+1, cookie.length);
                    return cookie.substring(transport.length+1, cookie.length);
                }
            }
            return "";
        }
    }
}
</script>

<style>

</style>
