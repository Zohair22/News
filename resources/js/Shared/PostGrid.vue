<template>

    <article
        class="border border-teal-300 rounded-4xl bg-gray-50 transition duration-700 transform hover:-translate-y-5 hover:bg-gray-200">
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

                <footer class="grid grid-cols-8 justify-between items-center lg:mt-8 mt-4">
                    <div class="flex items-center text-sm max-w-12  col-span-5">
                        <img src="/storage/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-1">
                            <h5 class="font-bold"><Link href="#">{{ post.admin.name }}</Link></h5>
                        </div>
                    </div>

                    <div
                        class="lg:block text-center duration-700 col-span-3 text-xs hover:text-white font-semibold bg-teal-200 transition hover:bg-teal-500 rounded-full py-2"
                    >
                        <Link
                            :href="'/post/'+post.slug"
                        >
                            Read More
                            <i class="fas fa-arrow-right ml-1 animate-bounceInLeft"></i>
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
