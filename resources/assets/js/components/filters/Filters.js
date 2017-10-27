import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {
    name: 'filters',
    mounted() {
        console.log('Component mounted filters.');

    },
    computed: mapGetters({
        flats: 'flats'

    }),
    data(){
        return{
            SPFCTE: true

        }
    },
    created(){

    },
    watch:{
        SPFCTE(optionValue) {
            let SPFCTE = true;
            if(optionValue === "false"){
                SPFCTE=false;
            }
            let array = flats;

            array.sort((a,b)=>{

                let max= a.price_total - b.price_total > 0 ? true : false;
                console.log(window.max= max);
                console.log(window.SPFCTE= SPFCTE);
                console.log(max == SPFCTE);
                return max === SPFCTE;
            });
            this.$store.commit(types.REWRITE_FLATS,{
                flats: array
            });


        }
    }
}