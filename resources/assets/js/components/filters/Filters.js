import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {

    name: 'filters',
    mounted() {
    },

    computed: {
        ...mapGetters({
            priceSortIndex: 'priceSortIndex',
            areaSortIndex: 'areaSortIndex'
        })
    },

    data() {
        return {

        }
    },

    created() {

    },

    methods: {
        ...mapActions({
            sortByPrice: 'sortByPrice',
            sortByArea: 'sortByArea'
        })
    },


}