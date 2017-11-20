import { mapState } from 'vuex'

export default {
    name: 'search',
    props:['fullScreen'],
    computed: {
        ...mapState('flats',{
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
        this.$store.dispatch('flats/searchCriteriaAJAX');
    },

    methods: {
        search () {
            this.$store.commit('flats/REWRITE_SEARCH_CRITERIA', {
                cityID: this.cityID,
                rooms: this.rooms
            });
            let url = "/search?cityID=" + this.cityID + "&rooms=" + this.rooms;
            this.$router.push(url);
        }
    }

}
