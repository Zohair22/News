<template>
    <div class="mt-0">
        <div class="mt-4">
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
