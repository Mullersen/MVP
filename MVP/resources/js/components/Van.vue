<template>
  <div class="has-text-centered">
      <h2 @click="updateTransport2" class="title is-3">I want to travel by van or RV</h2>
      <div v-if="this.$store.state.transportation == 'Van'">
          <h2>wohooo you chose Van!</h2>
      </div>
  </div>
</template>

<script>
export default {
    name:"Van",
    data: function(){
        return{
            transport: "Van"
        }
    },
    methods:{
        updateTransport2: function(){
            this.$store.commit('updateQuote', this.transport);
        }
    }
}
</script>

<style>

</style>
