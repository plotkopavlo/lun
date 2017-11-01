<template>
    <form action="none" name="price" class="filters">
        <select :value="priceSortIndex" @input="sortByPrice" name="price" class="filters--sort" >
            <option value="asc" selected>From chip to expensive</option>
            <option value="desc">From expensive to chip</option>

        </select>

        <select :value="areaSortIndex"  @input="sortByArea"  name="area" class="filters--sort" >
            <option value="asc" selected>From small to big</option>
            <option value="desc">From big to small</option>
        </select>

    </form>
</template>

<script src="./Filters.js"> </script>
<style src="./Filters.css"> </style>
