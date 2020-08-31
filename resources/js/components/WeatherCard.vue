<template>
    <div class="card">
        <div class="header bg-yellow-400 text-center p-4">
            <h3>Weather</h3>
        </div>
        <div class="body">
          
        </div>
        <span v-if="$geolocation.loading">Loading location...</span>
        <span v-else-if="!$geolocation.supported">Geolocation API is not supported</span>
        <!-- <span v-else>Range from destination: {{ inRange ? 'Allowed' : 'Disallowed' }}</span> -->

    </div>
</template>

<script>
export default {
    mounted() {
        this.geoFindMe();
    },
    methods: {
        geoFindMe() {
        }
    }
};
</script>

<style></style>
