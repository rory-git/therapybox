<template>
    <div>
        <div>
            <!-- <img :src="user.avatar" height="100" class="avatar rounded-full" /> -->
            <div class="">
                <h1 class="text-white text-center">
                    Good Day
                    <span class="capitalize ">{{ user.username }}</span>
                </h1>
            </div>
        </div>
        <div>
            <div class="card-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <weather-card />

                <div class="card">
                    <div class="header bg-yellow-400 text-center p-4">
                        <h3>Sport</h3>
                    </div>
                    <div class="body"></div>
                </div>
                <news-card />
                <div class="card">
                    <div class="header bg-yellow-400 text-center p-4">
                        <a href="/photos" class="hover:underline"><h3>Photos</h3></a>
                    </div>
                    <div class="body">
                        <div class="grid grid-cols-3 gap-4">
                            <div
                                v-for="(image, index) in photos"
                                :key="index"
                                class="relative"
                            >
                                <img
                                    class="w-full object-cover"
                                    :src="image"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <todos-card />
                <clothes-card />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: "",
            photos:""
        };
    },
    mounted() {
        this.user = user;
        this.photos = photos
    }
};
</script>

<style lang="scss">
.avatar {
    height: 100px;
    width: 100px;
}

.card-grid {
    min-height: 500px;
    padding: 40px 0;
}

.card {
    // height: 300px;
    background: rgba(250, 250, 250, 0.5);
    border-radius: 10px;
    border: 1px solid rgba(246, 224, 94);
    overflow: hidden;

    .body {
        padding: 15px;
        text-align: center;
        margin: 0 auto;
    }
}
</style>
