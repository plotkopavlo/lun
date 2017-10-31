<template>
    <section class="search">
        <h2 class="search--header">Let's find something</h2>
        <form method="GET" class="search--form">
            <input type="text" class="form-control" disabled placeholder="Search for...">
            <select name="city" class="selectpicker  ">
                <option v-for="(name, id) in citiesID" :value="{{ id }}">
                    {{ name }}
                </option>
            </select>
            <select name="rooms" class="selectpicker">
                @for($idx = 1; $idx <= $maxRooms; $idx++ )
                <option value="{{ $idx }}" {{ $idx == $rooms ? 'selected' : '' }}>
                {{ $idx }} rooms
                </option>
                @endfor
            </select>
            <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </div>
        </form>

    </section>

</template>