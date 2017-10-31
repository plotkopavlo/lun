// import shop from '../../api/shop'
import * as types from '../mutation-types'

// initial state
// shape: [{ id, quantity }]
/**
 *
 * @type {{flats: Array, flatsFilters: Array, checkoutStatus: null, citiesID: {}}}
 */

/**
 *
 * @type {{flats: Array, checkoutStatus: null, citiesID: [{id: number, name: string}], searchCriteria: {cityID: number, rooms: number}, priceRange: {min: number, max: number, isDESC: boolean}, areaRange: {min: number, max: number, isDESC: boolean}}}
 */
const state = {
    flats: [],

    checkoutStatus: null,

    citiesID: [
        {
            id: 0,
            name:'All'
        }

    ],

    searchCriteria: {
        cityID: 0,
        rooms: 0
    },

    priceRange: {
        min: 0,
        max: 0,
        isDESC: false,
    },

    areaRange:{
        min: 0,
        max: 0,
        isDESC: false
    }

};

// getters
const getters = {

    priceIsDESC: (state,getters,rootState) => state.priceRange.isDESC,

    areaIsDESC: (state,getters,rootState) => state.areaRange.isDESC,

    checkoutStatus: (state, getters, rootState) => state.checkoutStatus,

    flats: (state, getters, rootState) => state.flats
};

// actions
const actions = {

    sortByPrice({ state, commit, rootState }, event) {
        let isDESC = event.target.value === "true";
        console.log('price');
        commit({
            type: types.REWRITE_PRICE_IS_DESC,
            isDESC : isDESC
        });


        // getAjaxFlats({
        //     sort: {
        //         type: 'price',
        //         isDESC: state.priceRange.isDESC
        //     },
        //
        //     searchCriteria: state.searchCriteria
        //
        // })
    },

    sortByArea({ state, commit, rootState }, event) {
        let isDESC = event.target.value === "true";
        console.log( event.target.value);
        commit({
            type: types.REWRITE_AREA_IS_DESC,
            isDESC : isDESC
        });

        // getAjaxFlats({
        //     sort: {
        //         type: 'area',
        //         isDESC: state.priceArea.isDESC
        //     },
        //
        //     searchCriteria: state.searchCriteria
        //
        // })
    },

    getAjaxFlats( { state, commit, rootState }, body){

        return axios.get('/flats', body)
            .then(response => {

                commit(types.CHECKOUT_SUCCESS);

                commit({
                    type:types.REWRITE_FLATS,
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

    [types.CHECKOUT_REQUEST] (state) {
        state.flats = [];
        state.checkoutStatus = null
    },

    [types.CHECKOUT_SUCCESS] (state) {
        state.checkoutStatus = 'successful'
    },

    [types.CHECKOUT_FAILURE] (state) {
        state.checkoutStatus = 'failed'
    },

    [types.REWRITE_PRICE_IS_DESC] (state, data) {
        state.priceRange.isDESC = data.isDESC
    },

    [types.REWRITE_AREA_IS_DESC] (state, data) {
        state.areaRange.isDESC = data.isDESC
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}
