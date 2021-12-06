<template>

    <article class="border border-teal-300 rounded-4xl lg:p-5 bg-gray-50 my-6">
        <div class="lg:py-6 lg:flex items-center">
            <div class="lg:flex-1 lg:mr-8">
                <img
                    src="/storage/images/3q3fbyUo82l2xoyMbhkr2yyLoGIHtg4Xe9VDuB1D.png"
                    alt="Blog posted illustration"
                    class="lg:rounded-xl rounded-b rounded-4xl"
                >
            </div>
            <div class="flex-1 flex flex-col justify-between p-5">
                <header class="mt-0">

                    <div class="mt-4">
                        <h1 class="text-2xl text-green-800 uppercase" v-html="posted.title"></h1>
                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ posted.created_at }}</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm text-gray-500 mt-2 mb-6">
                    <h1 class="text-lg font-bold text-gray-800 mb-1">posted Excerpt</h1>
                    {{ posted.excerpt }}
                </div>

                <div class="mt-2">
                    <h1 class="text-lg font-bold text-gray-800 mb-1">posted Body</h1>
                    <p class="text-gray-600 space-y-5">
                        {{ posted.body }}
                    </p>
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img src="/storage/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3">
                            <h5 class="font-bold"><a href="#">Name Here</a></h5>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </article>
    <div class="max-w-4xl mx-auto border bg-gray-100 p-5 rounded-4xl border-teal-300 mt-6">
        <h1 class="text-2xl text-gray-700 font-bold mb-5 lg:text-center"> Comments </h1>
        <div v-for="comment in posted.comments">
            <div class="bg-gray-50 lg:flex lg:justify-between rounded-4xl p-5">

                <div>
                    <div class="flex flex-1 items-center text-sm">
                        <img src="/storage/images/lary-avatar.svg" alt="Lary avatar" width="35" height="25">
                        <div class="ml-2">
                            <h5 class="font-bold"><a href="#">Name Here</a></h5>
                        </div>
                    </div>
                </div>

                <div class="max-w-2xl lg:mt-0 lg:ml-0 mt-5 ml-6" v-html="comment.body"></div>
            </div>
            <hr class="my-5">
        </div>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase" for="comment">
                    <input
                        v-model="form.body"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="comment"
                        type="text"
                        name="body"
                        placeholder="Leave a Comment"
                        required
                    >
                </label>
                <div
                    v-if="form.errors.body"
                    v-text="form.errors.body[0]"
                    class="text-red-500 text-sm mt-1"
                ></div>
            </div>
            <div v-if="form.isDirty" class="text-red-500 text-sm">There are unsaved form changes.</div>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-6 rounded-3xl focus:outline-none focus:shadow-outline"
                :disabled="form.processing"
                type="submit"
            >
                Comment
            </button>
        </form>
    </div>

</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3"

let props = defineProps({
    'posted' : Object,
    'auth' : Object,
    'errors': Object,
})
const posted = props.posted
const user = props.auth.user
let form = useForm({
    body: '',
    post_id: posted.id,
    user_id: user.id,
});

let submit = () => {
    form.post('/new/comment', { preserveScroll: true, preserveState: false });
}

</script>

<style scoped>

</style>
