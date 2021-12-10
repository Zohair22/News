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
            <PostGrid v-if="post != null" :post="post"></PostGrid>
        </section>
    </div>
    <Pagination v-if="posts != null" class="mt-10 lg:p-2 p-1 border rounded-4xl bg-gray-800 text-white" :links="posts.links" />
</template>

<script setup>
import Pagination from "./Pagination"
import PostGrid from "./Posts/PostGrid"

defineProps({
    'posts': Object,
})
</script>

<style scoped>

</style>
