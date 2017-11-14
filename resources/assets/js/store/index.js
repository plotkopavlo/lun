import Vue from 'vue'
import Vuex from 'vuex'
import flats from './modules/flats'
// import * as actions from './actions'
// import * as getters from './getters'

Vue.use(Vuex);

export default new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',
    state: {
    },
    mutations: {
        flats(state, flats){
            state.flats = flats;
        }
    },
    modules: {
        'flats': flats

    }
})