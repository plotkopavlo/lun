<template>
    <div class="search">
        <h2 class="search__header">Let's find something</h2>
        <form method="GET" class="search--form form-inline">
            <div class="form-group">

                <label class="sr-only" for="flat-name">Search for...</label>

                <input type="text" id="flat-name" class="form-control" disabled placeholder="Search for...">
            </div>

            <div class="form-group">

                <label class="sr-only" for="city">City</label>

                <select v-model.number="cityID"  name="city" id="city" class="form-control" required>
                    <option value="0" selected> any </option>

                    <option v-for="city in cities" :value="city.id">
                        {{ city.name }}
                    </option>
                </select>
            </div>

            <div class="form-group">

                <label class="sr-only" for="rooms">Numbers of room</label>

                <select v-model.number="rooms" name="rooms" id="rooms" class="form-control" required>
                    <option value="0" selected> any </option>

                    <option v-for="n in roomsMax" :value="n">
                        {{ n }}
                    </option>
                </select>
            </div>

            <button @click="search" class="btn btn-default search__btn" type="button" >Go!</button>
        </form>

    </div>

</template>


<script src="./Search.js"></script>
<style src="./Search.css"></style>