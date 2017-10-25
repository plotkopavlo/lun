import axios from 'axios';
import apartment from './../apartment/Apartment.vue';
// import filters from './../filters/Filters.vue';

export default {
    mounted() {
        console.log('Component mounted1.');

    },
    components:{
        apartment: apartment
    },
    data(){
        return{
            flats:[]
        }
    },
    created(){
        console.log('created');
        axios.get(`/flats`)
            .then(response => {
            console.log(this.flats);
            this.flats = response.data.flats.data;
            console.log(this.flats);
    })
        .catch(e => {
            this.errors.push(e);
        })
    }
}