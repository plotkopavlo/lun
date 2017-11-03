import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {

    name: 'search',
    mounted() {
    },

    computed: {
        ...mapGetters({
            cities: 'cities',

            cityID: 'cityID',

            rooms: 'rooms',

            roomsMax: 'roomsMax'
        })
    },

    data() {
        return {

        }
    },

    created() {
        this.$store.dispatch('searchCriteriaAJAX');
    },

    methods: {

        ...mapActions({
            searchRequest      : 'searchRequest',
            cityIDChange       : 'cityIDChange',
            roomsChange        : 'roomsChange',
            searchCriteriaAJAX : 'searchCriteriaAJAX',
        })
    },


}