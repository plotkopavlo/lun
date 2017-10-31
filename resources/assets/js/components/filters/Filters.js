import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {

    name: 'filters',
    mounted() {
        console.log('Component mounted filters.');
    },

    computed: {
        ...mapGetters({
            priceIsDESC: 'priceIsDESC',
            areaIsDESC: 'areaIsDESC'
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