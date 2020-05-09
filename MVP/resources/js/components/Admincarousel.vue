<template>
<div>
    <div class="box">
        <p class="subtitle">Upload image to carousel</p>
        <div class="field">
            <label class="label">Image</label>
            <div class="control">
                <input class="input" id="file" type="file"  ref="file" v-on:change="handleFileUpload()">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button @click="uploadCarouselImage" class="button">Submit</button>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">
        <div
            id="cardContainer"
            class="column is-one-third"
            v-for="(image, index) in this.imageArray"
            :key="image.id"
        >
            <div class="card" :id="'image' + index">
                <div class="id" style="display:none">{{image.id}}</div>
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img
                            :src="image.images"
                            alt="carousel image"
                        />
                    </figure>
                </div>
                <div class="card-content">
                    <button class="button is-primary" @click="deleteCarouselImage(index)">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
const axios = require('axios');
export default {
    name: "Admincarousel",
    data: function(){
        return {
            file : "",
            imageArray: [],
        }
    },
    methods:{
        handleFileUpload: function(){
        this.file = this.$refs.file.files[0];
        console.log(this.file);
        },
        uploadCarouselImage: function(){
            let formData = new FormData();
            formData.append('image', this.file);

            axios.post('/carousel/uploadImage', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                })
                .then(response => {
                    console.log(response.data);
                      this.requestCarouselImages();
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        },
        deleteCarouselImage: function(index){
             var chosenImage = document.getElementById("image" + index).firstChild.innerHTML;
             axios.post('/carousel/deleteImage', {
                 id: chosenImage,
             })
                .then(response => {
                    console.log(response.data);
                    this.requestCarouselImages();
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        },
        requestCarouselImages: function(){
            axios.get('/carousel/requestImages')
                .then(response => {
                    console.log(response.data);
                    this.imageArray = response.data.carouselImages;

                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        }
    },
    mounted(){
        this.requestCarouselImages();
    }
}
</script>

<style>

</style>
