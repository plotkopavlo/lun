<template>
    <section class="search">
        <h2 class="search--header">Let's find something</h2>
        <form method="GET" class="search--form">
            <input type="text" class="form-control" disabled placeholder="Search for...">
            <select :value="cityID"  @input="cityIDChange" name="city" class="">
                <option v-for="(name, id) in citiesID" :value="id">
                    {{ name }}
                </option>
            </select>
            <select :value="rooms" @input="cityIDChange" name="rooms" class="">
                <option @for="point in roomsMax" :value="point">
                    <span @if="point==0">any rooms</span>
                    <span @else>{{ point }} rooms</span>
                </option>
            </select>
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">Go!</button>
            </div>
        </form>

    </section>

</template>