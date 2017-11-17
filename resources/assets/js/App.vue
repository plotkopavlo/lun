<template>
    <div id="app">
        <section class="first-screen search-block"
                 v-bind:class="{  'search-block--full-screen' : fullSearch}">
            <div class="search-block__container">
                <search :fullScreen="fullSearch"></search>
            </div>

        </section>

        <section class="result-block container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <router-view></router-view>

                    <!--<apartments-list class="center-screen"></apartments-list>-->
                </div>
            </div>

        </section>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                fullSearch: true
            }
        },
        watch: {
            '$route': 'isFullScreen'
        },
        created() {
            this.isFullScreen();
        },
        mounted() {
            this.isFullScreen();
        },
        methods:{
            isFullScreen(){
                console.log(this.$route);
                this.fullSearch = this.$route.path == "/";
            }
        }
    }
</script>

<style lang="scss">

    .first-screen {
        background-color: #464646;
    }

    .search-block {
        display: flex;
        background: url(/img/main.jpg) 50% 50% fixed, #464646;
        background-size: cover;
        padding: 20px 20px;
        &--full-screen{
            height: 100vh;
        }
    }

    .search-block__container {
        margin:auto;
    }

    .result-block {
        padding-top: 25px;
    }

</style>
