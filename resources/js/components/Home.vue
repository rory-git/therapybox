<template>
    <div>
        <img :src="user.avatar" alt="" />
        home
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: ""
        };
    },
    mounted() {
        this.user = user;
    }
};
</script>

<style></style>
