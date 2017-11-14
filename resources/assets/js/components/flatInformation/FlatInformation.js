import { mapState } from 'vuex'

import gallery from './../gallery/Gallery.vue';


export default  {
    name: 'flatInformation',

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
            }
        }
    },
    components: {
        gallery: gallery
    }

}