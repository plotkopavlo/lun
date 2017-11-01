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

    priceFilter: {
        min: 0,
        max: 0,
        sortIndex: "",
    },

    areaFilter:{
        min: 0,
        max: 0,
        sortIndex: ""
    }

};

// getters
const getters = {

    priceSortIndex: (state,getters,rootState) => state.priceFilter.sortIndex,

    areaSortIndex: (state,getters,rootState) => state.areaFilter.sortIndex,

    checkoutStatus: (state, getters, rootState) => state.checkoutStatus,

    flats: (state, getters, rootState) => state.flats
};

// actions
const actions = {

    sortByPrice({ state, commit, rootState }, event) {
        commit({
            type: types.REWRITE_PRICE,
            min: null,
            max: null,
            sortIndex : event.target.value
        });

        console.log(this);
        this._actions.getAjaxFlats({
            sort: {
                type: 'price',
                sortIndex: state.priceFilter.sortIndex
            },

            searchCriteria: state.searchCriteria

        })
    },

    sortByArea({ state, commit, rootState }, event) {
        commit({
            type: types.REWRITE_AREA,
            min: null,
            max: null,
            sortIndex : event.target.value
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

    getAjaxFlats( { state, commit, rootState }, body) {

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

    [types.REWRITE_PRICE] (state, data) {

         if(data.sortIndex) {
            console.log(data);
            state.priceFilter.sortIndex = data.sortIndex;
            console.log(state.priceFilter.sortIndex);
        }
        //
        // if(data.min) {
        //     state.priceFilter.min = data.min;
        // }
        //
        // if(data.max) {
        //     state.priceFilter.min = data.max;
        // }


    },

    [types.REWRITE_AREA] (state, data) {
        if(data.sortIndex) {
            state.areaFilter.sortIndex = data.sortIndex;
        }

        if(data.min) {
            state.areaFilter.min = data.min;
        }

        if(data.max) {
            state.areaFilter.min = data.max;
        }
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}
