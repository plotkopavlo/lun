<template>
    <li class="apartment-item">
        <div class="apartment-item--img-container">
            <!-- TODO: image -->
            <img src="img/page.jpg" class="apartment-item--img" alt="flat's picture">
        </div>
        <div class="apartment-item--left-info">
            <div class="apartment-item--info-text">
                <a>{{ flat.name }}</a> - updated {{ flat.updated }}
            </div>
            <div class="apartment-item--info-text">
                <b>Description: </b> <span v-html="flat.description"></span>
            </div>
            <div class="apartment-item--info-text">
                <span v-if="flat.buildings[0]">{{ flat.residential_complex.name }}</span>
                <span v-else>-</span>
            </div>
            <div class="apartment-item--info-text">
                <b>City:</b>
                <span v-if="flat.city">{{ flat.city.name }}</span>
                <span v-else>-</span>
            </div>
            <div class="apartment-item--info-text">
                <b>Rooms: </b> {{ flat.num_of_rooms }}
            </div>
            <div class="apartment-item--info-text">
                <b>Building(s): </b>
                <ul >
                    <li v-for="building in flat.buildings">{{ building.name }}</li>
                </ul>
            </div>
        </div>
        <div class="apartment-item--right-info">
            <div class="apartment-item--info-text">{{ flat.total_price }} $</div>
            <div class="apartment-item--info-text">
                <b>Area: </b> {{ flat.area_m2 }} m2
            </div>
        </div>
    </li>
</template>

<script src="./Apartment.js"> </script>
<style src="./Apartment.css"> </style>