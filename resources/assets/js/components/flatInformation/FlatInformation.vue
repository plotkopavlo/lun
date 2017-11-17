<template>
    <section class="flat-information">
            <div class="flat-information__gallery">
                <img src="img/page.jpg" class="flat-information__img" alt="flat's picture">
                <!--<gallery></gallery>-->
            </div>
            <div class="flat-information__info">
                <div class="apartment-item__info-text">
                    <b>City:</b>
                    <span v-if="flat.city">{{ flat.city.name }}</span>
                    <span v-else>-</span>
                </div>
                <div class="apartment-item__info-text">
                    <b>Rooms: </b>
                    <span>
                        {{ flat.num_of_rooms }}
                    </span>
                </div>
                <!--<div class="apartment-item&#45;&#45;info-text">-->
                    <!--<b>Building(s): </b>-->
                    <!--<ul >-->
                        <!--<li v-for="building in flat.buildings">{{ building.name }}</li>-->
                    <!--</ul>-->
                <!--</div>-->
            </div>
        <div class="flat-infotmation__description">
            <b>Description: </b>
            <div class="flat-infotmation__text" v-html="flat.description">

            </div>]
        </div>
    </section>
</template>

<script src="./FlatInformation.js"> </script>
<style src="./FlatInformation.css"> </style>