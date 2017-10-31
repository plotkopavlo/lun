<template>
    <form action="none" name="price" class="filters">
        <select :value="priceIsDESC" @input="sortByPrice" name="price" class="filters--sort-by-price" >
            <option :value="true" selected>From chip to expensive</option>
            <option :value="false">From expensive to chip</option>

        </select>

        <select :value="areaIsDESC"  @input="sortByArea"  name="area" class="filters--sort-by-price" >
            <option :value="true" selected>From small to big</option>
            <option :value="false">From big to small</option>
        </select>

    </form>
</template>

<script src="./Filters.js"> </script>
<style src="./Filters.css"> </style>
