<template>
    <div>
        <p class="subtitle">this is the addons</p>
        <div class="field">
            <label class="label">Name of new Addon</label>
            <div class="control">
                <input class="input" v-model="NewAddonTitle" type="text" placeholder="Title">
            </div>
        </div>
        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <input class="input" v-model="NewAddonDescription" type="text" placeholder="Description">
            </div>
        </div>
        <div class="field">
            <label class="label">Image</label>
            <div class="control">
                <input class="input" id="file" type="file"  ref="file" v-on:change="handleFileUpload()">
            </div>
        </div>
        <div class="field">
            <label class="label">Price</label>
            <div class="control">
                <input class="input" v-model="NewAddonPrice" type="text" placeholder="Price">
            </div>
        </div>
        <div class="field">
            <label class="label">Locations</label>
            <div class="control">
                <input class="input" v-model="NewAddonLocations" type="text" placeholder="Locations, separated by a space">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button @click="uploadAddon">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    name: "Adminaddon",
    data: function(){
        return{
            NewAddonTitle: "",
            NewAddonDescription: "",
            NewAddonPrice: "",
            NewAddonLocations: "",
            file: "",
        }
    },
    methods: {
        handleFileUpload: function(){
        this.file = this.$refs.file.files[0];
        console.log(this.file);
        },

        uploadAddon: function(){
            let formData = new FormData();
            formData.append('image', this.file);
            formData.append('title', this.NewAddonTitle);
            formData.append('description', this.NewAddonDescription);
            formData.append('price', this.NewAddonPrice);
            formData.append('location', this.NewAddonLocations);

            axios.post('/addons/uploadAddon', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        }
    }
}
</script>

<style>

</style>
