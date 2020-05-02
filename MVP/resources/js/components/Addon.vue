<template>
  <div class="has-background-secondary">
    <div v-for="(addon, index) in this.$store.state.addonArray" :key="addon.id">
      <div class="columns">
        <div class="column is-one-quarter">
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img
                  src="images/DSC00046.JPG"
                  alt="activity for Inside Canada in the Rocky Mountains"
                />
              </figure>
            </div>
            <div class="card-content">
              <p class="title is-4">{{addon.activity}}</p>
              <p class="subtitle is-6">{{addon.price}}</p>
              <!-- <p class="content">{{description}}</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Addon",
  methods: {}
};
</script>

<style>
</style>
