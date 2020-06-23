<template>
  <div class="box">
      <p class="subtitle">Lokationer</p>
      <label class="label">Tilføj eksisterende lokation</label>
      <div class="field is-grouped">
        <div class="control is-expanded">
          <div v-if="this.$store.state.existingLocationTags.length >= 1" class="select">
            <select v-model="selectedLocationTags">
              <option v-for="location in this.$store.state.existingLocationTags" :key="location.id" :value="location.name">{{location.name}}</option>
            </select>
          </div>
        </div>
        <div class="control">
          <button class="button" @click="addExistingLocationTag()">Tilføj</button>
        </div>
      </div>
      <label class="label">Tilføj ny lokation</label>
      <div class="field is-grouped">
        <div class="control is-expanded">
          <input
            class="input"
            v-model.trim="newLocationTags"
            type="text"
            placeholder="Tags separeret med et komma"
          />
        </div>
        <div class="control">
          <button class="button" @click="addNewLocationTag()">Tilføj</button>
        </div>
      </div>
      <div v-if="this.$store.state.locationTags.length >= 1" class="field">
        <h2 class="subtitle">Tilføjede lokationer</h2>
        <p v-for="(locationTag, index) in this.$store.state.locationTags" :key="index" class="content">{{locationTag}}</p>
      </div>
    </div>
</template>

<script>
const axios = require("axios");
export default {
  name: "LocationTag",
  data: function() {
    return {
      newLocationTags: "",
      selectedLocationTags: [],
       //locationTags: []
    };
  },
  methods: {
    getLocationTags: function() {
      axios
        .get("locations/getLocationTags")
        .then(response => {
          console.log(response.data.tags);
          //upload data to store
          this.$store.commit('updateExistingLocationTags', response.data.tags);
        })
        .catch(error => {
          console.log(error.message);
        });
    },
    addExistingLocationTag: function() {
      //this.locationTags.push(this.selectedLocationTags);
      this.$store.commit('updateFinalLocationTags', this.selectedLocationTags);
    },
    addNewLocationTag: function() {
      var str = this.newLocationTags.replace(/\s+/g, "");
      var tagsArray = str.split(",");
      var finalTags = tagsArray.filter(word => word.length >= 1);
      this.$store.commit('updateFinalLocationTags', finalTags);
      //console.log(this.locationTags);
    },
  },
  mounted() {
    this.getLocationTags();
  }
};
</script>

<style>

</style>
