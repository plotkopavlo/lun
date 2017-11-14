import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {
    name: 'filters',

    computed: {
    },

    data() {
        return {
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


        }
    },

    methods: {
        sortByPrice(event) {
            this.priceFilter.sortIndex == event.target.value
            this.dispatch('getAjaxFlats',{
                sort: {
                    type: 'price',
                    sortIndex: this.priceFilter.sortIndex
                }
            });

        },

        sortByArea(event) {

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
    },


}