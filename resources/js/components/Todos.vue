<template>
    <div>
        <h1 class="text-center text-white mb-10">Tasks</h1>
        <ValidationObserver v-slot="{ handleSubmit }">
            <form @submit.prevent="handleSubmit(submit)">
                <div
                    v-for="(todo, index) in todos"
                    :key="index"
                    class="todo py-5"
                    :class="todo.complete ? 'complete' : null"
                >
                    <div class="flex items-center justify-between">
                        <div class="w-3/4">
                            <ValidationProvider
                                name="confirm"
                                rules="required"
                                v-slot="{ errors }"
                            >
                                <input
                                    type="text"
                                    @keyup="submit(index)"
                                    v-model="todos[index].title"
                                    class="text-white w-full bg-transparent border-b-2 border-white"
                                    :class="
                                        todo.complete ? 'line-through' : null
                                    "
                                />
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div @click="removeTodo(index)" class="cursor-pointer">
                            <img class="w-5" src="/img/bin.svg" alt="" />
                        </div>
                        <input
                            type="checkbox"
                            v-model="todos[index].complete"
                            @change="submit(index)"
                        />
                    </div>
                </div>
            </form>
        </ValidationObserver>

        <div class="text-center">
            <button
                @click.prevent="addTodo()"
                class="bg-yellow-400 px-20 py-3 rounded-full"
            >
                + Add
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: "",
            showForm: false,
            user: ""
        };
    },
    mounted() {
        this.todos = todos;
        this.user = user;
    },
    created() {
        this.submit = _.debounce(this.submit, 300);
    },
    methods: {
        submit(index) {
            if (this.todos[index].title.length) {
                let loader = this.$loading.show();

                axios
                    .put(`/api/todo/${this.todos[index].id}`, this.todos[index])
                    .then(res => {
                        this.todos[index] = res.data;
                        loader.hide();
                    });
            }
        },
        removeTodo(index) {
            let loader = this.$loading.show();

            axios
                .delete(`/api/todo/${this.todos[index].id}`, this.todos[index])
                .then(res => {
                    this.todos = res.data;
                    loader.hide();
                })
                .catch(e => {
                    loader.hide();
                });
        },
        addTodo() {
            let loader = this.$loading.show();

            axios
                .post(`/api/todo/create`, {
                    user_id: this.user.id
                })
                .then(res => {
                    this.todos = res.data;
                    loader.hide();
                })
                .catch(e => {
                    loader.hide();
                });
        }
    }
};
</script>

<style></style>
