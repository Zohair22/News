<template>

    <article class="border border-teal-300 rounded-4xl lg:p-5 bg-gray-50 my-6">
        <div class="lg:py-6 lg:flex items-center">
            <div class="lg:flex-1 lg:mr-8">
                <img
                    src="/storage/images/3q3fbyUo82l2xoyMbhkr2yyLoGIHtg4Xe9VDuB1D.png"
                    alt="Blog Post illustration"
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
                    <h1 class="text-lg font-bold text-gray-800 mb-1">Post Body</h1>
                    <p class="text-gray-600 space-y-5">
                        {{ post.body }}
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
            <div v-for="comment in comments">
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
        </div>

</template>

<script setup>
defineProps({
    'post' : Array,
    'comments' : Object,
})
</script>

<style scoped>

</style>
