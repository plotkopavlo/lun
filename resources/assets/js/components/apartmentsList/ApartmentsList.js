import { mapState } from 'vuex'

import apartment from './../apartment/Apartment.vue';
import filters from './../filters/Filters.vue';


export default  {
    name: 'apartmentsList',

    components: {
        apartment: apartment,
        filters:   filters
    },

    data() {
        return{

        }
    },

    computed: mapState('flats', {
            flats: 'flats',
    }),
}