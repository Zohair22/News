<template>
    <Head title="Register" />

    <main class="max-w-sm mx-auto grid place-items-center min-h-screen">
        <div class="bg-gray-50 px-6 py-8 rounded-4xl shadow text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form @submit.prevent="submit">
                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="name"
                    v-model="form.name"
                    placeholder="Full Name"
                />

                <div
                    v-if="form.errors.name"
                    v-text="form.errors.name[0]"
                    class="text-red-500 text-sm text-center mt-1"
                ></div>

                <input
                    type="email"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="email"
                    v-model="form.email"
                    placeholder="Email"
                >
                <div
                    v-if="form.errors.email"
                    v-text="form.errors.email[0]"
                    class="text-red-500 text-sm text-center mt-1"
                ></div>

                <input
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password"
                    v-model="form.password"
                    placeholder="Password"
                >
                <div
                    v-if="form.errors.password"
                    v-text="form.errors.password[0]"
                    class="text-red-500 text-sm text-center mt-1"
                ></div>

                <input
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    v-model="form.password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                >
                <div
                    v-if="form.errors.password_confirmation"
                    v-text="form.errors.password_confirmation[0]"
                    class="text-red-500 text-sm text-center mt-1"
                ></div>

                <button
                    :disabled="form.processing"
                    type="submit"
                    class="w-full text-center py-3 rounded bg-teal-500 text-white hover:bg-teal-800 focus:outline-none my-1"
                >
                    Create Account
                </button>

                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class="underline  text-blue-500" href="../login">Log in</a> .
                </div>
            </form>
        </div>
    </main>

</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

defineProps({
    errors: Object,
});

let submit = () => {
    form.post('/register');
}
</script>

<style scoped>

</style>
