<template>
    <div>
        <div>
            <h1 class="text-white text-center">Dev Challenge</h1>
        </div>
        <div>
            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(submit)">
                    <div class="flex flex-col justify-between">
                        <div class="md:flex flex-wrap -mx-20">
                            <div class="md:w-1/2 py-10 px-20">
                                <div class="col-md-6">
                                    <input
                                        id="username"
                                        type="text"
                                        class="text-white w-full bg-transparent border-b-2 border-white "
                                        name="username"
                                        required
                                        autocomplete="username"
                                        autofocus
                                        placeholder="Username"
                                        v-model="form.username"
                                    />
                                </div>
                            </div>

                            <div class="md:w-1/2 py-10 px-20">
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="text-white w-full bg-transparent border-b-2 border-white"
                                        name="email"
                                        required
                                        autocomplete="email"
                                        placeholder="Email"
                                        v-model="form.email"
                                    />
                                </div>
                            </div>

                            <div class="md:w-1/2 py-10 px-20">
                                <ValidationProvider
                                    rules="required|password:@confirm"
                                    v-slot="{ errors }"
                                >
                                    <input
                                        type="password"
                                        v-model="form.password"
                                        class=" text-white w-full bg-transparent border-b-2 border-white"
                                        placeholder="Password"
                                    />
                                    <span class="text-white">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>

                            <div class="md:w-1/2 py-10 px-20">
                                <ValidationProvider
                                    name="confirm"
                                    rules="required"
                                    v-slot="{ errors }"
                                >
                                    <input
                                        type="password"
                                        v-model="form.password_confirmation"
                                        class=" text-white w-full bg-transparent border-b-2 border-white"
                                        placeholder="Confirm Password"
                                    />
                                    <span>{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="flex justify-center mb-10">
                            <image-input
                                v-model="form.avatar"
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
                            <button
                                type="submit"
                                class="bg-yellow-400 px-20 py-3 rounded-full"
                            >
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                avatar: "",
                email: "",
                username: "",
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        onChange(image) {
            console.log("New picture selected!");
            if (image) {
                console.log("Picture loaded.");
                this.image = image;
            } else {
                console.log(
                    "FileReader API not supported: use the <form>, Luke!"
                );
            }
        },
        submit() {
            console.log(this.form);
            axios.post("/register", this.form).then(res => {
                console.log(res.data);
            });
        }
    }
};
</script>

<style></style>
