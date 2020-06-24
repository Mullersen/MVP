<template>
  <div>
    <div class="box">
      <p class="subtitle">Create new addon</p>
      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" v-model="NewAddonTitle" type="text" placeholder="Title" />
        </div>
      </div>
      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <input class="input" v-model="NewAddonDescription" type="text" placeholder="Description" />
        </div>
      </div>
      <div class="field">
        <label class="label">Image</label>
        <div class="control">
          <input class="input" id="file" type="file" ref="file" v-on:change="handleFileUpload()" />
        </div>
      </div>
      <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input class="input" v-model="NewAddonPrice" type="text" placeholder="Price" />
        </div>
      </div>
      <LocationTag />
      <div class="field">
        <div class="control">
          <button class="button" @click="uploadAddon">Submit</button>
        </div>
      </div>
    </div>
    <div class="columns is-multiline">
      <div
        id="cardContainer"
        class="column is-one-quarter"
        v-for="(addon, index) in this.$store.state.addonArray"
        :key="addon.id"
      >
        <div class="card" :id="'addon' + index">
          <div class="id" style="display:none">{{addon.id}}</div>
          <div class="card-image">
            <figure class="image is-4by3">
              <img :src="addon.image" alt="activity for Inside Canada in the Rocky Mountains" />
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4 has-text-dark">{{addon.activity}}</p>
            <p class="subtitle is-6">{{addon.price}} CAD</p>
            <!-- <p class="content">{{description}}</p> -->
            <button @click="promptQuestion(index)" class="button is-primary">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <div id="hidden" class="box">
      <p class="title">Are you sure you want to delete this Addon?</p>
      <button class="button" @click.once="deleteAddon">Yes</button>
      <button class="button" @click="goBack">No, take me back</button>
    </div>
  </div>
</template>

<script>
const axios = require("axios");
import LocationTag from "./LocationTag.vue";

export default {
  name: "Adminaddon",
  components: {
    LocationTag
  },
  data: function() {
    return {
      NewAddonTitle: "",
      NewAddonDescription: "",
      NewAddonPrice: "",
      file: "",
      id: ""
    };
  },
  methods: {
    handleFileUpload: function() {
      this.file = this.$refs.file.files[0];
      console.log(this.file);
    },
    uploadAddon: function() {
      let formData = new FormData();
      formData.append("image", this.file);
      formData.append("title", this.NewAddonTitle);
      formData.append("description", this.NewAddonDescription);
      formData.append("price", this.NewAddonPrice);
      formData.append("tags", this.$store.state.locationTags);

      axios
        .post("/addons/uploadAddon", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          }
        })
        .then(response => {
          console.log(response.data);
          this.$store.dispatch("requestAddons");
          this.$store.commit("clearLocationTags");
          this.NewAddonTitle= "";
          this.NewAddonDescription= "";
          this.NewAddonPrice= "";
        })
        .catch(error => {
          console.log(error.message); // change to error message on screen
        });
    },
    promptQuestion: function(index) {
      this.id = document.getElementById("addon" + index).firstChild.innerHTML;
      document.getElementById("hidden").classList.add("visible");
    },
    goBack: function() {
      document.getElementById("hidden").classList.remove("visible");
    },
    deleteAddon: function() {
      axios
        .post("/addons/deleteAddon", {
          id: this.id
        })
        .then(response => {
          console.log(response.data);
          this.goBack();
          this.$store.dispatch("requestAddons");
        })
        .catch(error => {
          console.log(error.message); // change to error message on screen
        });
    }
  },
  mounted() {
    this.$store.dispatch("requestAddons");
  }
};
</script>

<style>
#hidden {
  display: none;
}
.visible {
  display: block !important;
  position: fixed;
  width: 50vw;
  height: 25vh;
  top: 25vh;
  left: 25vw;
  background-color: grey;
}
</style>
