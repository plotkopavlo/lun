<template>
    <section class="flat-information">
        <div class="flat-information__main">
            <div class="flat-information__gallery">
                <gallery></gallery>
            </div>
            <div class="flat-information__text">
                <div class="apartment-item--info-text">
                    <b>City:</b>
                    <span v-if="flat.city">{{ flat.city.name }}</span>
                    <span v-else>-</span>
                </div>
                <div class="apartment-item--info-text">
                    <b>Rooms: </b> {{ flat.num_of_rooms }}
                </div>
                <!--<div class="apartment-item&#45;&#45;info-text">-->
                    <!--<b>Building(s): </b>-->
                    <!--<ul >-->
                        <!--<li v-for="building in flat.buildings">{{ building.name }}</li>-->
                    <!--</ul>-->
                <!--</div>-->
            </div>
        </div>
        <div class="flat-infotmation__description">
            <b>Description: </b> <span v-html="flat.description"></span>
        </div>
        <h2 class="flat-information__header">Work</h2>
    </section>
</template>

<script src="./FlatInformation.js"> </script>
<style src="./FlatInformation.css"> </style>