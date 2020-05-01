<template>
  <div class="has-text-centered">
      <div class="columns">
        <h2 class="column is-half title" @click="updateTransport(index)" v-for="(transportation, index) in this.$store.state.transportationArray" :key="transportation.id"> I want to travel by {{transportation.transport_method}}</h2>
      </div>
  </div>
</template>

<script>
export default {
    name:"Transport",
    data: function(){
        return{
            transport: "Car"
        }
    },
    methods:{
        updateTransport: function(index){
            //this.$store.commit('updateQuote', this.$store.state.transportationArray[index].transport_method);
            document.cookie = "transport =" + this.$store.state.transportationArray[index].transport_method + "";
        },
    },
    mounted(){
        this.$store.dispatch('requestTransportation');
        },
}
</script>

<style>

</style>
