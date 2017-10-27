<template>
    <form action="none"  class="filters-for-flat">
        <select v-model="SPFCTE" name="Price" id="">
            <option value="true" selected>From chip to expensive</option>
            <option value="false">From expensive to chip</option>
        </select>

    </form>
</template>

<script src="./Filters.js"> </script>
<style src="./Filters.css"> </style>