// import shop from '../../api/shop'
import * as types from '../mutation-types'

const state = {
    checkoutStatus: null,

    roomsMax: 5,

    cities: [
        // {
        //     id: 0,
        //     name:'Any',
        // }
    ],

    searchCriteria: {
        cityID: 0,
        rooms: 0
    },
    flats: []
};

// getters
const getters = {
};

// actions
const actions = {
    searchRequest({state, commit, rootState }) {
        console.log(state.searchCriteria);
        this.dispatch('flats/getAjaxFlats',state.searchCriteria
        )

    },

    searchCriteriaAJAX( { state, commit, rootState }) {
        return axios.get('/searchCriteria')
            .then(response => {
                let data = response.data;
                    commit({
                        type: types.REWRITE_CITIES,
                        cities: data.cities
                    });

                    commit(types.REWRITE_MAX_ROOM, {
                        roomsMax: data.roomsMax
                    });

            })
            .catch(error => {
                commit(types.CHECKOUT_FAILURE);
                console.error(error)
            });

    },


    getAjaxFlats( { state, commit, rootState }, body) {
        return axios({
            method: 'get',
            url:'/flats',
            params: body
        })
            .then(response => {

                commit(types.CHECKOUT_SUCCESS);
                commit({
                    type:types.REWRITE_FLATS,
                    flats: response.data.flats.data
                });

                return response
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

         if (data.sortIndex) {
            state.priceFilter.sortIndex = data.sortIndex;
         }

        if (data.min) {
            state.priceFilter.min = data.min;
        }

        if (data.max) {
            state.priceFilter.min = data.max;
        }

    },

    [types.REWRITE_AREA] (state, data) {
        if(data.sortIndex !== undefined) {
            state.areaFilter.sortIndex = data.sortIndex;
        }

        if(data.min !== undefined) {
            state.areaFilter.min = data.min;
        }

        if(data.max !== undefined) {
            state.areaFilter.min = data.max;
        }
    },

    [types.REWRITE_CITIES] (state, data) {
        state.cities = data.cities
    },

    [types.REWRITE_MAX_ROOM] (state, data) {
        state.roomsMax = data.roomsMax
    },

    [types.REWRITE_SEARCH_CRITERIA] (state, data) {
        if(data.rooms !== undefined) {
            state.searchCriteria.rooms = data.rooms;
        }

        if(data.rooms !== undefined) {
            state.searchCriteria.cityID = data.cityID;
        }
    },
};

export default {
    namespaced : true,
    state,
    getters,
    actions,
    mutations
}
