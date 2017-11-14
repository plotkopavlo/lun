import { mapState } from 'vuex'

export default {
    name: 'search',

    computed: {
        ...mapState({
            cities: 'cities',

            roomsMax: 'roomsMax'
        })
    },

    data() {
        return {
            cityID: 0,
            rooms: 0

        }
    },

    created() {
        this.$store.dispatch('searchCriteriaAJAX');
    },

    methods: {
        search (){
           this.$store.commit('REWRITE_SEARCH_CRITERIA',{
               cityID: this.cityID,
               rooms: this.rooms
           });
           this.$store.dispatch('searchRequest');
        },
    },

}