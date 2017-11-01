import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {

    name: 'filters',
    mounted() {
        console.log('Component mounted filters.');
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