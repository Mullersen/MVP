<template>
  <div class="box">
        <p class="subtitle">Create new route</p>
        <div class="field">
            <label class="label">Routename</label>
            <div class="control">
                <input class="input" v-model="NewRouteTitle" type="text" placeholder="Title">
            </div>
        </div>
        <div class="field">
            <label class="label">Price</label>
            <div class="control">
                <input class="input" v-model="NewRoutePrice" type="text" placeholder="Price">
            </div>
        </div>
        <LocationTag/>
        <div class="field">
            <div class="control">
                <button class="button" @click="uploadRoute">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require('axios');
import LocationTag from './LocationTag.vue';


export default {
name : "Adminroute",
components: {
    LocationTag
},
data: function() {
    return{
        NewRouteTitle: "",
        NewRoutePrice: "",
    }
}, 
methods: {
    uploadRoute: function(){
        console.log("upload route entered");
            let formData = new FormData();
            formData.append('title', this.NewRouteTitle);
            formData.append('price', this.NewRoutePrice);
            formData.append('tags', this.$store.state.locationTags);

            axios.post('/trip/uploadTrip', formData, {
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
        },
}
}
</script>

<style>

</style>