<template>
    <div id="app">
        <section class="first-screen search-block"
        v-bind:class="{  'search-block--full-screen' : fullScreen}">
            <div id="container" class="container-canvas"
                 v-bind:class="{  'container-canvas--full-screen' : fullScreen}"></div>
            <div class="search-block__container">
                <search :fullScreen="fullScreen"></search>
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
                fullScreen: true
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
            require('./animation/index.js')
        },
        methods:{
            isFullScreen(){
                console.log(this.$route);
                this.fullScreen = this.$route.path == "/";
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

        &--full-screen{
            height: 100vh;
        }
    }
    .search-block__container {
        z-index:100;
        margin:auto;
    }

    .result-block {
        padding-top: 25px;
    }
    .container-canvas{
        display: none;
        z-index: 100;
        position: absolute;
        width:100vw;
        height: 100vh;
        &--full-screen{
            display: block;
            height: 100vh;
        }
        & canvas{
            width: 100% !important;
            height: 100vh !important;
        }
    }

</style>
