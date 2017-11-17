<template>
    <div class="apartments">
        <div class="apartments__loading" v-if="loading">
            Загрузка...
        </div>

        <div class="apartments__error" v-if="error" >
            {{ error }}
        </div>
        <div class="apartments__data" v-if="flats">

            <h2 class="apartments-title">Found <span>{{ flats.length }}</span> results</h2>
            <filters></filters>
            <ul class="apartments-list">
                <apartment v-for="flat in flats" :flat="flat"></apartment>
            </ul>
        </div>
    </div>
</template>

<script src="./ApartmentsList.js"> </script>
<style src="./ApartmentsList.css"> </style>