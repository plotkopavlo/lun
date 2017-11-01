import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {

    name: 'search',
    mounted() {
        console.log('Component mounted filters.');
    },

    computed: {
        ...mapGetters({
            citiesID: 'citiesID',

            cityID: 'cityID',

            rooms: 'rooms'
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
        })
    },


}