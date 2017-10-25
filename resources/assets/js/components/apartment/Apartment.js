export default {
    mounted() {
        console.log('Component mounted1.')
    },
    props:['flat'],
    created(){
        console.log(this.flat);
    }
}