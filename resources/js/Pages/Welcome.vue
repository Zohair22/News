<template>
    <Head>
        <title>Home</title>
    </Head>
        <FirstPost :post="posts.data[0]" ></FirstPost>
        <div class="grid grid-cols-6 gap-8">
            <section
                v-for="(post, index) in posts.data"
                :class="
            [
                index < 3 ? 'lg:col-span-3 md:col-span-3 col-span-6 ' : 'lg:col-span-2 md:col-span-3 col-span-6',
                index === 0 ? 'hidden' : ''
            ]"
            >
                <PostGrid :post="post"></PostGrid>
            </section>
        </div>
        <Pagination class="mt-10 lg:p-2 p-1 border rounded-4xl bg-gray-800 text-white" :links="posts.links" />

</template>

<script setup>
import Pagination from "../Shared/Pagination";
import PostGrid from "../Shared/PostGrid";
import FirstPost from "../Shared/FirstPost";
defineProps({
    'posts' : Object
})
</script>

<style scoped>

</style>
