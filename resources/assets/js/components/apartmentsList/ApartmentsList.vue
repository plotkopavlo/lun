<template>
    <div class="apartments">
        <h2 class="apartments-title">Found <span>{{ flats.length }}</span> results</h2>
        <filters></filters>
        <ul class="apartments-list">
            <apartment v-for="flat in flats" :flat="flat"></apartment>
        </ul>
    </div>
</template>

<script src="./ApartmentsList.js"> </script>
<style src="./ApartmentsList.css"> </style>