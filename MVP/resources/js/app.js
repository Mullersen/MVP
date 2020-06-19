const axios = require('axios');

window.Vue = require('vue');

import Vuex from 'vuex';
Vue.use(Vuex);

const appStore = new Vuex.Store({
    state: {
        transportationArray: [],
        chosenTransportation: [],
        addonArray: [],
        chosenAddons: [],
        chosenRoute: [],
        locationTags: [],
    },
    mutations: {
        updateRoute: function(state, data) {
                state.chosenRoute = data;
            }
            //     updateChosenTransportation: function(state, data) {
            //         state.chosenTransportation = data;
            //     },
            //     updateChosenAddons: function(state, data) {
            //         state.chosenAddons = data;
            //     },
    },
    actions: {
        //find the methods of transportations stored in the database
        requestTransportation: function(context) {
            axios.get('/getTransportation')
                .then(response => {
                    //console.log(response.data.transportation);
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
        },
        requestRoutes: function(context) {
            axios.get('/getRoutes')
                .then(response => {
                    //set up for when there will be more routes
                    context.commit('updateRoute', response.data.routes)
                        //context.state.chosenRoute = response.data.routes[0];
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        },
        getChosenAddons: function(context, payload) {
            axios.post('/cart/getAddons', {
                    id: payload,
                })
                .then(response => {
                    console.log(response.data.chosenAddons);
                    context.state.chosenAddons = response.data.chosenAddons;
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        },
        getChosenTransportation: function(context, payload) {
            axios.post('/cart/getTransportation', {
                    chosenMethod: payload,
                })
                .then(response => {
                    console.log(response.data);
                    context.state.chosenTransportation = response.data.chosenTransportation;
                })
                .catch(error => {
                    console.log(error.message); // change to error message on screen
                });
        },
    }
});

Vue.component('Root', require('./components/Root.vue').default);

Vue.component('Cart', require('./components/Cart.vue').default);

Vue.component('Adminroot', require('./components/Adminroot.vue').default);

const app = new
Vue({
    el: '#app',

    store: appStore
});