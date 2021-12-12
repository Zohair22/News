

<template>
    <Head title="AdminLogin" />
    <main class="max-w-md mx-auto grid place-items-center min-h-screen">
        <section class="border p-6 shadow-xl rounded-3xl w-full m-5 bg-gray-50">
            <h1 class="text-3xl text-teal-500 text-center mb-4">Administrator Login</h1>
            <form @submit.prevent="submitLogin">
                <div class="mb-4">
                    <label class="block text-gray-700 text-xs font-bold mb-2 uppercase" for="email">
                        Email
                    </label>
                    <input
                        v-model="form.email"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Email"
                        required
                    >

                    <div
                        v-if="form.errors.email"
                        v-text="form.errors.email[0]"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-xs font-bold mb-2 uppercase" for="password">
                        Password
                    </label>
                    <input
                        v-model="form.password"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                    >

                    <div
                        v-if="form.errors.password"
                        v-text="form.errors.password[0]"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>
                </div>

                <div class="flex items-center justify-between">
                    <div></div>
                    <button
                        class="bg-teal-500 transition duration-700 hover:bg-teal-700 text-white font-bold px-6 rounded-3xl"
                        :disabled="form.processing"
                        type="submit"
                    >
                        Login
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let form = useForm({
    email: '',
    password: '',
});

defineProps({
    errors: Object,
});

let submitLogin = () => {
    form.post('/signIn');
}
</script>
