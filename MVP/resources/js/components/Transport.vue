<template>
  <div class="has-text-centered">
      <div class="columns">
        <h2 class="column is-half title" @click="updateTransport(index)" v-for="(transportation, index) in this.$store.state.transportationArray" :key="transportation.id"> I want to travel by {{transportation.transport_method}}</h2>
      </div>
      <div v-if="toggleState == true">
            <Addon/>
      </div>
  </div>
</template>

<script>
import Addon from './Addon.vue';

export default {
    name:"Transport",
    components: {
        Addon,
    },
    data: function(){
        return{
            transport: "Car",
            toggleState: false,
        }
    },
    methods:{
        updateTransport: function(index){
            document.cookie = "transport =" + this.$store.state.transportationArray[index].transport_method + "";
            this.toggleState = true;
        },
    },
    mounted(){
        this.$store.dispatch('requestTransportation');
        },
}
</script>

<style>

</style>
