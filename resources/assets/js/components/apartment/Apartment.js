export default {
    mounted() {
        console.log('Component mounted.');
    },
    props:['flat'],
    created(){
        console.log(this.flat);
    }
}