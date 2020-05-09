const axios = require('axios');

window.Vue = require('vue');

import Vuex from 'vuex';
Vue.use(Vuex);

const appStore = new Vuex.Store({
    state: {
        transportationArray: [],
        chosenTransportation: "",
        addonArray: [],
        chosenAddons: [],
        chosenRoute: [],
    },
    mutations: {
        updateChosenTransportation: function(state, data) {
            state.chosenTransportation = data;
        },
        updateChosenAddons: function(state, data) {
            state.chosenAddons = data;
        },
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
                    //console.log(response.data.routes[0].id);
                    context.state.chosenRoute = response.data.routes;
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
                    //console.log(response.data.chosenAddons);
                    var chosenActivities = response.data.chosenAddons.map(i => i.activity);
                    console.log(chosenActivities);
                    context.state.chosenAddons = response.data.chosenAddons;
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