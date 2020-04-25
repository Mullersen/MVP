<template>
  <div class="has-text-centered">
      <h2 @click="updateTransport" class="title is-3">I want to travel by car</h2>
      <div v-if="this.$store.state.transportation == 'Car'">
          <h2>wohooo you chose car!</h2>
      </div>
  </div>
</template>

<script>
export default {
    name:"Car",
    data: function(){
        return{
            transport: "Car"
        }
    },
    methods:{
        updateTransport: function(){
            this.$store.commit('updateQuote', this.transport);
        }
    }

}
</script>

<style>

</style>
