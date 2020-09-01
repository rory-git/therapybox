<template>
    <div class="card">
        <div class="header bg-yellow-400 text-center p-4">
            <a href="/sports" class="hover:underline"><h3>Sport</h3></a>
        </div>
        <div class="body">
            <div v-if="news">
                <h4>{{ news[0].title }}</h4>
                <p>{{ news[0].shortdesc }}</p>
            </div>
            <div v-else class="text-center">Loading...</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            news: ""
        };
    },
    mounted() {
        this.news = sportsNews;
    }
};
</script>

<style></style>
