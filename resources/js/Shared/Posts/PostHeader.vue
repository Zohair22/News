<template>
    <div class="mt-0">
        <div class="mt-4">
            <div class="mb-4">
                <Link :href="'/news?category='+post.category.name" v-text="post.category.name"
                      class="border border-teal-500 hover:bg-teal-500 hover:text-white rounded-4xl px-5 py-1 text-teal-500" />
            </div>
            <h1 class="text-2xl text-green-800 uppercase" v-html="post.title"></h1>
            <p class="mt-2 block text-gray-400 text-xs">Published <time>{{ post.created_at }}</time></p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    'post': Array,
})
</script>

<style scoped>

</style>
