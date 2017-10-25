<template>
   <ul class="apartments-list">
       <!--<filer></filer>-->
       <apartment v-for="flat in flats" :flat="flat"></apartment>
   </ul>
</template>

<script src="./ApartmentsList.js"> </script>
<style src="./ApartmentsList.css"> </style>