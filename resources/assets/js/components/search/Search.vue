<template>
    <section class="search">
        <h2 class="search--header">Let's find something</h2>
        <form method="GET" class="search--form input-group">
            <input type="text" class="form-control" disabled placeholder="Search for...">
            <select :value="cityID"  @input="cityIDChange" name="city" class="">
                <option v-for="city in cities" :value="city.id">
                    {{ city.name }}
                </option>
            </select>

            <select :value="rooms" @input="roomsChange" name="rooms" id="rooms">
                <option v-for="n in (roomsMax+1)" :value="n-1">
                    <span v-if="n-1 === 0"> any </span>
                    <span v-else> {{ n-1 }} </span>
                </option>
            </select>
            <div class="input-group-btn">
                <button v-on:click="searchRequest" class="btn btn-default" type="button" >Go!</button>
            </div>
        </form>

    </section>

</template>


<script src="./Search.js"></script>
<!--<style src="Search.css"></style>-->