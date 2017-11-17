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
            loading: false,
            error: null
        }
    },

    watch:{
        '$route': 'getFlats'
    },

    computed: mapState('flats', {
            flats: 'flats',
    }),

    created() {
        this.getFlats();
    },

    methods:{
        getFlats(){
            this.error  = null;
            this.loading = true;
            console.log(this.loading);
            let cityID = this.$route.query.cityID ? this.$route.query.cityID : 0;
            let rooms = this.$route.query.rooms ? this.$route.query.rooms : 0;

            this.$store.commit('flats/REWRITE_SEARCH_CRITERIA', {
                cityID: cityID,
                rooms: rooms
            });

            this.$store.dispatch('flats/searchRequest')
                .then(() => {
                    this.loading = false;
                    this.error   = false;
                })
                .catch((errore) => {
                    this.error= true;
                });
        }
    }
}