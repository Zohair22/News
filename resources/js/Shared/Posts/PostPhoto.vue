<template>
    <Link :href="'/post/'+post.slug">
        <img src="/storage/images/3q3fbyUo82l2xoyMbhkr2yyLoGIHtg4Xe9VDuB1D.png"
             alt="Blog Post illustration" class="rounded-4xl">
    </Link>
</template>

<script setup>
defineProps({
    post: Array,
})
</script>

<style scoped>

</style>
