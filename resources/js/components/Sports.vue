<template>
    <div>
        <h1 class="text-white text-center mb-10">Sports</h1>
        <div>
            <form @submit.prevent="fetchResults">
                <div class="md:flex justify-between">
                    <div class="md:w-1/2 py-3">
                        <input
                            type="text"
                            v-model="query"
                            @keyup="fetchResults"
                            class="text-white w-full bg-transparent border-b-2 border-white"
                            placeholder="Input Winning Team"
                        />
                    </div>
                    <div class="md:w-1/2 md:text-right py-3">
                        <button
                            type="submit"
                            class="bg-yellow-400 px-20 py-3 rounded-full"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="results py-10">
            <h4
                v-if="resultsCount > 0"
                class="capitalize text-center text-white"
            >
                The teams {{ query }} won against:
            </h4>
            <h4 v-else class="capitalize text-center text-white">
                No results for "{{ query }}"
            </h4>
            <ul>
                <li
                    class="py-1 text-white"
                    v-for="(team, index) in results"
                    :key="index"
                >
                    {{ team }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            query: "",
            results: []
        };
    },
    mounted() {},
    created() {
        this.fetchResults = _.debounce(this.fetchResults, 100);
    },
    methods: {
        fetchResults() {
            if (!this.query.length) {
                return;
            }

            // let loader = this.$loading.show();

            axios.get(`/api/sports/${this.query}`).then(res => {
                this.results = res.data;
                // loader.hide();
            });
        }
    },
    computed: {
        resultsCount() {
            return Object.keys(this.results).length;
        }
    }
};
</script>

<style></style>
