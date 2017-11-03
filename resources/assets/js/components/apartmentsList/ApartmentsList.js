import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

import apartment from './../apartment/Apartment.vue';
import filters from './../filters/Filters.vue';


export default  {
    name: 'apartmentsList',

    components: {
        apartment: apartment,
        filters:   filters
    },
    data() {
        return{}
    },
    computed: mapGetters({
            flats: 'flats',
    }),

    created(){
        // this.$store.dispatch('getAjaxFlats');
    },

}