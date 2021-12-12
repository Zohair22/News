<template>
    <div class="max-w-4xl mx-auto border bg-white p-5 rounded-4xl border-teal-300 mt-6">
        <h1 class="text-2xl text-gray-700 font-bold mb-5 lg:text-center"> Comments </h1>
        <div v-for="comment in post.comments">
            <div class="flex justify-between rounded-4xl bg-gray-50 py-3 px-5">
                <div class="lg:flex">
                    <div class="flex items-center text-xs mr-6">
                        <div>
                            <img src="/storage/images/lary-avatar.svg" alt="Lary avatar" width="30" height="30">
                        </div>
                        <div class="ml-2">
                            <h5 class="font-bold"><a href="#">{{ comment.user.name }}</a></h5>
                        </div>
                    </div>

                    <div
                        class="max-w-2xl lg:mt-0 lg:ml-0 mt-5 ml-6 text-gray-600"
                        v-html="comment.body"
                    ></div>
                </div>

                <div v-if="user && user.email === comment.user.email" >
                    <button
                        @click.prevent="deleteComment(comment)"
                        class="far fa-trash-alt text-red-500"
                    />
                </div>
            </div>
            <hr class="my-5">
        </div>

        <form v-if="user" @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase" for="comment">
                    <input
                        v-model="form.body"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
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
        </form>

        <div v-else class="text-center text-gray-600">
            Please
            <Link class="text-blue-500 text-bold underline" :href="'/login'">Login</Link>
            to Add a new Comment
        </div>

    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    'post' : Array,
    'auth' : Object,
    'errors': Object,
})
const post = props.post
const user = props.auth.user
let form = useForm({
    body: '',
    post_id: post.id,
    user_id: user ? user.id : '',
});

let submit = () => {
    form.post('/new/comment', { preserveScroll: true, preserveState: false });
}
let deleteComment = (comment) => {
    Inertia.get(`/delete/comment/${comment.id}`, {
        preserveScroll: true,
        onBefore: () => confirm('Are you sure you want to delete this comment?')
    })
}
</script>

<style scoped>

</style>
