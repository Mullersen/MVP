/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
const axios = require('axios');

window.Vue = require('vue');

import Vuex from 'vuex';
Vue.use(Vuex);

const appStore = new Vuex.Store({
    state: {
        transportationArray: [],
        transportation: "",
        addonArray: [],
        chosenAddons: [],
    },
    mutations: {
        updateQuote: function(state, data) {
            state.transportation = data;
        },
        updateAddons: function(state, data) {
            state.chosenAddons = data;
        }
    },
    actions: {
        //find the methods of transportations stored in the database
        requestTransportation: function(context) {
            axios.get('/getTransportation')
                .then(response => {
                    console.log(response.data.transportation);
                    context.state.transportationArray = response.data.transportation;
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        },
        requestAddons: function(context) {
            axios.get('/getAddons')
                .then(response => {
                    //console.log(response.data.addons);
                    context.state.addonArray = response.data.addons;
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        }
    }
});

Vue.component('Root', require('./components/Root.vue').default);
Vue.component('Cart', require('./components/Cart.vue').default);


const app = new Vue({
    el: '#app',
    store: appStore
});