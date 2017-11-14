export default {
    name: 'apartment',

    mounted() {
    },

    props:['flat'],
    computed:{
        url(){
            return '/flat/' + this.flat.id
        }
    },

    created(){
    }
}