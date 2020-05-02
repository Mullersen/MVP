<template>
  <div>
      <p class="title is-3">Cart</p>
      <p class="subtitle is-3">Chosen method of transportation</p>
      <p>{{getCookie("transport")}}</p>
      <div v-for="transportation in this.$store.state.transportationArray" :key="transportation.id">
          <p v-if="transportation.transport_method == transportationMethod">{{transportation.price}} CAD</p>
      </div>
  </div>
</template>

<script>
export default {
    name:"Cart",
    data: function(){
        return{
            transportationMethod: ""
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
                    this.transportationMethod = cookie.substring(transport.length+1, cookie.length);
                    return cookie.substring(transport.length+1, cookie.length);
                }
            }
            return "";
            this.$store.dispatch('requestTransportation');
        }
    }
}
</script>

<style>

</style>
