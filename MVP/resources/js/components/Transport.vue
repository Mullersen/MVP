<template>
  <div class="has-text-centered">
      <p class="content">We have come up with what we think is a really good route for the time you are in Canada. You have a bunch of options to choose from on the route. Along the way we will bring you on a virtual trip. All pictures are clickable, and will show you what your choices will look like on your trip. </p>
      <div class="columns">
        <h2 class="column is-half title" @click="updateTransportLoadAddons(index)" v-for="(transportation, index) in this.$store.state.transportationArray" :key="transportation.id"> I want to travel by {{transportation.transport_method}}</h2>
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
            toggleState: false,
        }
    },
    methods:{
        updateTransportLoadAddons: function(index){
            this.$store.commit('updateQuote', this.$store.state.transportationArray[index].transport_method);
            document.cookie = "transport=" + this.$store.state.transportationArray[index].transport_method + "";
            this.toggleState = true;
            this.$store.dispatch('requestAddons');
        },
    },
    mounted(){
        this.$store.dispatch('requestTransportation');
        },
}
</script>

<style>

</style>
