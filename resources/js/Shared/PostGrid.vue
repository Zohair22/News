<template>

    <article
        class="border border-teal-300 rounded-4xl bg-gray-50 transition duration-700 transform hover:-translate-y-5 hover:bg-gray-200 relative max-h-post min-h-post">
            <div>
                <Link :href="'/post/'+post.slug">
                    <img src="/storage/images/3q3fbyUo82l2xoyMbhkr2yyLoGIHtg4Xe9VDuB1D.png"
                         alt="Blog Post illustration" class="rounded-b rounded-4xl">
                </Link>
            </div>

        <div class="py-8 px-5">
            <div class="flex flex-col justify-between">
                <header class="">
                    <div>
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

                <footer class="flex justify-between items-center lg:mt-8 mt-4">
                    <div class="flex items-center text-sm">
                        <img src="/storage/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3">
                            <h5 class="font-bold"><Link href="#">This Name</Link></h5>
                        </div>
                    </div>

                    <div class="lg:block">
                        <Link
                            :href="'/post/'+post.slug"
                            class="text-xs hover:text-white font-semibold bg-teal-200 transition duration-1000 hover:bg-teal-500 rounded-full py-2 px-8"
                        >
                            Read More
                        </Link>
                    </div>
                </footer>
            </div>
        </div>
    </article>

</template>

<script setup>
defineProps({
    'post' : Array,
})
</script>

<style scoped>

</style>
