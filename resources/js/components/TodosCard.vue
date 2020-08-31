<template>
    <div class="card">
        <div class="header bg-yellow-400 text-center p-4">
            <a href="/tasks" class="hover:underline"><h3>Tasks</h3></a>
        </div>
        <div class="body">
            <div v-for="(todo,index) in todos" :key="index" class="todo" :class="todo.complete ? 'complete' : null">
                <div class="flex items-center justify-between">
                    <p class="w-3/4">{{todo.title}}</p>
                    <input type="checkbox" name="" id="" :checked="todo.complete" v-model="todos[index].complete" @change="submit(index)">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: "",
        };
    },
    mounted() {
        this.todos = todos;
    },
    methods: {
        submit(index) {
            let loader = this.$loading.show();

            axios.put(`/api/todo/${this.todos[index].id}`, this.todos[index])
            .then(res => {
                this.todos[index] = res.data;
                loader.hide();
            })
        }
    }
};
</script>

<style lang="scss">
.todo {
    &.complete {
        p {
            text-decoration: line-through;
        }
    }
}
</style>
