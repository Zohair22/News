<template>

    <article class="border border-teal-300 rounded-4xl lg:p-5 bg-gray-50 my-6">
        <div class="lg:py-6 lg:flex items-center">
            <div class="lg:flex-1 lg:mr-8">
                <img
                    src="/storage/images/3q3fbyUo82l2xoyMbhkr2yyLoGIHtg4Xe9VDuB1D.png"
                    alt="Blog post illustration"
                    class="lg:rounded-xl rounded-b rounded-4xl"
                >
            </div>
            <div class="flex-1 flex flex-col justify-between p-5">
                <header class="mt-0">

                    <div class="mt-4">
                        <h1 class="text-2xl text-green-800 uppercase" v-html="post.title"></h1>
                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ post.created_at }}</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm text-gray-500 mt-2 mb-6">
                    <h1 class="text-lg font-bold text-gray-800 mb-1">Post Excerpt</h1>
                    {{ post.excerpt }}
                </div>

                <div class="mt-2">
                    <h1 class="text-lg font-bold text-gray-800 mb-1">posted Body</h1>
                    <p class="text-gray-600 space-y-5">
                        {{ post.body }}
                    </p>
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img src="/storage/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3">
                            <h5 class="font-bold"><a href="#">{{ post.admin.name }}</a></h5>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </article>
    <CommentPost  :post="post" :auth="auth" :errors="errors"></CommentPost>
</template>

<script setup>
import CommentPost from "../Shared/CommentPost";

defineProps({
    'post' : Object,
    'auth' : Object,
    'errors': Object,
})
</script>

<style scoped>

</style>
