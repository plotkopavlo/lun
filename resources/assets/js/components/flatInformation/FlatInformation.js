import { mapState } from 'vuex'

import gallery from './../gallery/Gallery.vue';


export default  {
    name: 'flatInformation',

    components: {
        gallery: gallery
    },

    data() {
        return {
            flat: {
                name: "asdasdsa",

                city: {
                    id: 1,
                    name: 'Kiev'
                },

                num_of_rooms: 2,
                description: "adsadasdasdsaaadd"
            },
            loading: false,
            error: null
        }
    },

    created(){
        console.log('create FlatInformation');
        this.fetchData();
    },

    watch: {
        '$route': 'fetchData'
    },

    methods: {
        fetchData () {
            console.log('asd');
            this.error  = null;
            this.loading = true;
             axios({
                method: 'get',
                url:'/flat/' +this.$route.params.id
            })
                .then((response) => {
                 console.log(response.data);
                    this.flat = response.data;
                    this.loading = null;
                })
                .catch((error) => {
                    this.error = true;
                })

            // замените здесь `getPost` используемым методом получения данных / доступа к API

        }
    }

}