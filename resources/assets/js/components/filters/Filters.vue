<template>
    <form action="none" name="sort" class="form-inline filters">
        <div class="form-group">

            <label class="sr-only" for="price">Sort by Price</label>

            <select :model="priceFilter.sortIndex" @input="sortByPrice" name="price" id="price" class="form-control filters--sort " >
                <option value="asc" selected>From chip to expensive</option>
                <option value="desc">From expensive to chip</option>
            </select>
        </div>


        <!--<select :value="areaSortIndex"  @input="sortByArea"  name="area" class="form-control filters&#45;&#45;sort" >-->
            <!--<option value="asc" selected>From small to big</option>-->
            <!--<option value="desc">From big to small</option>-->
        <!--</select>-->

    </form>
</template>

<script src="./Filters.js"> </script>
<style src="./Filters.css"> </style>
