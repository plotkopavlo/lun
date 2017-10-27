// import shop from '../../api/shop'
import * as types from '../mutation-types'

// initial state
// shape: [{ id, quantity }]
/**
 *
 * @type {{flats: Array, flatsFilters: Array, checkoutStatus: null, citiesID: {}}}
 */
const state = {
    flats: [],
    flatsFilters:[],
    checkoutStatus: null,
    citiesID: {},
    roomsType:{},
    PriceRange:{
        min: null,
        max: null
    },
    AreaRange:{
        min: null,
        max: null
    }

};

// getters
const getters = {
    checkoutStatus: (state, getters, rootState) => state.checkoutStatus,
    flats: (state, getters, rootState) =>{
        // TODO: WHY???
        // TODO: WHY???
        return state.flats;
    }
};

// actions
const actions = {
    getAjaxFlats( { state, commit, rootState }){
        return axios.get('/flats')
            .then(response => {
                window.flats= response.data.flats.data;
                commit(types.CHECKOUT_SUCCESS);
                commit(types.REWRITE_FLATS,{
                    flats: response.data.flats.data
                });
                commit(types.REWRITE_FLATS_FILTERS,{
                    flats: response.data.flats.data
                });
            })
            .catch(error => {
                commit(types.CHECKOUT_FAILURE);
                console.error(error)
            });

    }
};

// mutations
const mutations = {
    [types.REWRITE_FLATS] (state, data) {
        state.flats = data.flats
    },
    [types.REWRITE_FLATS_FILTERS] (state, data) {
        state.flatsFilters = data.flats
    },

    [types.CHECKOUT_REQUEST] (state) {
        // clear cart
        state.flats = [];
        state.flatsFilters = [];
        state.checkoutStatus = null
    },

    [types.CHECKOUT_SUCCESS] (state) {
        state.checkoutStatus = 'successful'
    },

    [types.CHECKOUT_FAILURE] (state) {
        state.checkoutStatus = 'failed'
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}
