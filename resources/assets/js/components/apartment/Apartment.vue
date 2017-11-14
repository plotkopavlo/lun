<template>
    <li class="apartment-item">
        <router-link to="/flat" class="apartment-item__link">
            <div class="apartment-item__img-container">
                <!-- TODO: image -->
                <img src="img/page.jpg" class="apartment-item__img" alt="flat's picture">
            </div>
            <div class="apartment-item__left-info">
                <div class="apartment-item__info-text">
                    <b>{{ flat.name }}</b> - <small>updated {{ flat.updated }}</small>
                </div>
                <div class="apartment-item__info-text">
                    <b>Description: </b> <span v-html="flat.description"></span>
                </div>
                <div class="apartment-item__info-text">
                    <span v-if="flat.buildings[0]">{{ flat.residential_complex.name }}</span>
                    <span v-else>-</span>
                </div>
                <div class="apartment-item__info-text">
                    <b>City:</b>
                    <span v-if="flat.city">{{ flat.city.name }}</span>
                    <span v-else>-</span>
                </div>
                <div class="apartment-item__info-text">
                    <b>Rooms: </b> {{ flat.num_of_rooms }}
                </div>
                <div class="apartment-item__info-text">
                    <b>Building(s): </b>
                    <ul >
                        <li v-for="building in flat.buildings">{{ building.name }}</li>
                    </ul>
                </div>
            </div>
            <div class="apartment-item__right-info">
                <div class="apartment-item__info-text">{{ flat.price_total }} $</div>
                <div class="apartment-item__info-text">
                    <b>Area: </b> {{ flat.area_m2 }} m2
                </div>
            </div>
        </router-link>

    </li>
</template>

<script src="./Apartment.js"> </script>
<style src="./Apartment.css" lang="scss"> </style>