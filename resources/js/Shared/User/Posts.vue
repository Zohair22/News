<template>
    <div class="grid grid-cols-6 gap-8" >
        <section
            v-for="(post, index) in posts.data"
            :class="
                [
                    index < 3 ? 'lg:col-span-3 md:col-span-3 col-span-6 ' : 'lg:col-span-2 md:col-span-3 col-span-6',
                    index === 0 ? 'hidden' : ''
                ]"
        >
            <PostGrid v-if="index" :post="post"></PostGrid>
        </section>
    </div>
</template>

<script setup>
import PostGrid from "./Posts/PostGrid"

defineProps({
    'posts': Object,
})
</script>

<style scoped>

</style>
