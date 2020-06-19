<template>
  <div class="box">
      <p class="subtitle">Lokationer</p>
      <label class="label">Tilføj eksisterende lokation</label>
      <div class="field is-grouped">
        <div class="control is-expanded">
          <div class="select">
            <select v-model="selectedLocationTags">
              <option v-for="location in existingLocationTags" :key="location.id" :value="location.name">{{location.name}}</option>
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
      <div v-if="location.length >= 1" class="field">
        <h2 class="subtitle">Tilføjede lokationer</h2>
        <p v-for="(locationTag, index) in locationTags" :key="index" class="content">{{locationTag}}</p>
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
      existingLocationTags: [],
      locationTags: []
    };
  },
  methods: {
    getLocationTags: function() {
      axios
        .get("locations/getLocationTags")
        .then(response => {
          console.log(response.data.tags);
          this.existingLocationTags = response.data.tags;
        })
        .catch(error => {
          console.log(error.message);
        });
    },
    addExistingLocationTag: function() {
      this.locationTags.push(this.selectedLocationTags);
      console.log(this.locationTags);
    },
    addNewLocationTag: function() {
      var str = this.newLocationTags.replace(/\s+/g, "");
      var tagsArray = str.split(",");
      var finalTags = this.locationTags.concat(tagsArray);
      this.locationTags = finalTags;
      console.log(this.locationTags);
    },
  },
  mounted() {
    this.getLocationTags();
  }
};
</script>

<style>

</style>
