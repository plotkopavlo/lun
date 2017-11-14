export default {
    name: 'apartment',

    mounted() {
    },

    props:['flat'],
    computed:{
        url(){
            console.log('/flat/' + this.flat.id);
            return '/flat/' + this.flat.id
        }
    },

    created(){
    }
}