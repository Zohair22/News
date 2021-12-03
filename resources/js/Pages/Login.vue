

<template>
    <Head title="Login" />
    <main class="max-w-md mx-auto grid place-items-center min-h-screen">
        <section class="border p-6 shadow-3xl rounded-3xl w-full m-5 bg-gray-50">

            <h1 class="text-3xl text-teal-500 text-center mb-4">Login</h1>

            <form @submit.prevent="submit">
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
                        v-text="form.errors.email"
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
                        v-text="form.errors.password"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>
                </div>

                <div class="flex items-center justify-between">
                    <div></div>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-6 rounded-3xl focus:outline-none focus:shadow-outline"
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

const form = useForm({
    email: null,
    password: null,
    remember: false,
})

defineProps({
    errors: Object,
});

let submit = () => {
    form.post('/login');
}
</script>
