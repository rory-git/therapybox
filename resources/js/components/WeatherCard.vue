<template>
    <div class="card">
        <div class="header bg-yellow-400 text-center p-4">
            <h3>Weather</h3>
        </div>
        <div class="body mt-3">
            <div v-if="weather">
                <img src="/img/Clouds_icon.png" class="m-auto" alt="" />
                <h4>{{ weather.name }}</h4>
                <p class="capitalize">{{ weather.weather[0].description }}</p>
                <p>Feels Like {{ weather.main.feels_like }}&degC</p>
                <p>
                    From {{ weather.main.temp_min }}&degC To
                    {{ weather.main.temp_max }}&degC
                </p>
            </div>
            <div v-else>
                Loading...
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            weather: ""
        };
    },
    mounted() {
        this.weather = weather;
    }
};
</script>

<style></style>
