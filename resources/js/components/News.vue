<template>
    <div class="text-white">
        <div class="text-center">
            <h1 class="text-white">News</h1>
        </div>
        <div v-if="feed">
            <div class="h-64 overflow-hidden my-20">
                <img
                    :src="feed.image.url"
                    alt=""
                    class=" w-full mx-auto object-cover"
                />
            </div>
            <div>
                <h2 class="text-center">{{ feed.items[0].title }}</h2>
                <p class="my-2" style="min-height:150px;">
                    {{ feed.items[0].content }}
                </p>
                <a :href="feed.items[0].link" target="_blank">
                    <div class="text-center">
                        <button
                            type="submit"
                            class="bg-yellow-400 text-black px-20 py-3 rounded-full"
                        >
                            Read More
                        </button>
                    </div>
                </a>
            </div>
        </div>
        <div v-else class="body">
            Loading ...
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
