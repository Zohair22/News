<template>
    <div class="text-sm text-gray-500 mt-2 mb-6">
        <h1 class="text-lg font-bold text-gray-800 mb-1">Post Excerpt</h1>
        {{ post.excerpt }}
    </div>
    <div class="mt-2" v-if="!bodyActive">
        <h1 class="text-lg font-bold text-gray-800 mb-1">Post Body</h1>
        <p class="text-gray-600 space-y-5">
            {{ post.body }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    'post': Array,
    'bodyActive': Boolean,
})
</script>

<style scoped>

</style>
