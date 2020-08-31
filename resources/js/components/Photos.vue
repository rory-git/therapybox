<template>
    <div>
        <h1 class="text-white text-center mb-20">Photos</h1>
        

        <div class="grid grid-cols-3 gap-4">
            <div v-for="(image,index) in photos" :key="index" class="relative" >
                <img class="w-full object-cover" :src="image" alt="" >
                <!-- <span class="absolute top-0 left-0 p-3 text-white bg-red-600 cursor-pointer" @click="remove(index)">DELETE</span> -->
            </div>
        </div>

        <form @submit.prevent="submit" class="mt-10" v-if="photos.length <= 5">
            <div class="flex justify-center mb-10">
            <image-input
                v-model="form.image"
                :customStrings="{
                    placeholder: `➕`,
                    legend: ``
                }"
                :fontSize="'2em'"
                :width="280"
                :height="280"
                :radius="8"
                @change="onChange"
            />
        </div>
        <div class="text-center">
            <button type="submit" class="bg-yellow-400 px-20 py-3 rounded-full">
                + Add
            </button>
        </div>
        </form>
    </div>
</template>

<script>
export default {
    props:['photos'],
    data() {
        return {
            user: "",
            form: {
                image: ""
            }
        };
    },
    mounted() {
        this.user = user;
    },
    methods: {
        onChange(image) {
            console.log("New picture selected!");
            if (image) {
                console.log("Picture loaded.");
                this.image = image;
            } else {
                console.log("FileReader API not supported");
            }
        },
        submit() {
            axios.post(`/api/photos/${this.user.id}`, this.form).then(res => {
                location.reload()
            });
        },
         remove() {
            axios.delete(`/api/photos/${this.user.id}`, this.form).then(res => {
                location.reload()
            });
        }
    }
};
</script>

<style></style>
