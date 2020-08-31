<template>
    <div class="card">
        <div class="header bg-yellow-400 text-center p-4">
            <h3>News</h3>
        </div>
        <div class="body"  v-if="feed">
            <div>
                <a :href="feed.items[0].link" target="_blank">
                    <h4>{{ feed.items[0].title }}</h4>
                    <p class="my-2">{{ feed.items[0].content }}</p>
                    <img :src="feed.image.url" alt="" class="mx-auto" />
                </a>
            </div>
        </div>
    </div>
</template>

<script>
let Parser = require("rss-parser");

export default {
    data() {
        return {
            feed: ""
        };
    },
    mounted() {
        
        const CORS_PROXY = "https://cors-anywhere.herokuapp.com/";

        let parser = new Parser();
        parser.parseURL(
            CORS_PROXY + "https://feeds.bbci.co.uk/news/rss.xml",
            (err, feed) => {
                if (err) throw err;
                this.feed = feed;
            }
        );
    }
};
</script>

<style></style>
