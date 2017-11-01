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

    roomsMax: 0,

    citiesID: [
        {
            id: 0,
            name:'Any',
            selected: true
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

    flats: (state, getters, rootState) => state.flats,

    checkoutStatus: (state, getters, rootState) => state.checkoutStatus,

    //filter
    priceSortIndex: (state,getters,rootState) => state.priceFilter.sortIndex,

    areaSortIndex: (state,getters,rootState) => state.areaFilter.sortIndex,

    //search

    citiesID:(state,getters,rootState) => state.citiesID,

    cityID:(state,getters,rootState) => state.searchCriteria.cityID,

    roomsMax:(state,getters,rootState) => state.roomsMax,

    rooms:(state,getters,rootState) => state.searchCriteria.rooms,



};

// actions
const actions = {

    searchCriteriaAJAX({ state, commit, rootState }) {
        axios.get('/searchCriteria')
            .then((response) => {
                let data = response.data;

                commit({
                    type: types.REWRITE_CITIES_ID,
                    citiesID: data.citiesID
                });

                commit({
                    type: types.REWRITE_MAX_ROOM,
                    roomsMax: data.roomsMax
                });
            })
            .error((error) => {
                console.error(error);
            })
    },

    cityIDChange({ state, commit, rootState }, event) {
        commit({
            type: types.REWRITE_SEARCH_CRITERIA,
            cityID: event.target.value
        })
    },

    roomsChange({ state, commit, rootState }, event) {
        commit({
            type: types.REWRITE_SEARCH_CRITERIA,
            rooms: event.target.value
        })
    },

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

        if(data.min) {
            state.priceFilter.min = data.min;
        }

        if(data.max) {
            state.priceFilter.min = data.max;
        }

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
    },

    [types.REWRITE_CITIES_ID] (state, data) {
        state.citiesID = data.citiesID
    },

    [types.REWRITE_MAX_ROOM] (state, data) {
        state.roomsMax = data.roomsMax
    },

    [types.REWRITE_SEARCH_CRITERIA] (state, data) {
        if(data.rooms) {
            state.searchCriteria.rooms = data.rooms;
        }

        if(data.cityID) {
            state.searchCriteria.cityID = data.cityID;
        }
    },
};

export default {
    state,
    getters,
    actions,
    mutations
}
