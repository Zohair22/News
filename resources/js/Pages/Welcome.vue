<template>
    <Head>
        <title>Home</title>
    </Head>

    <Header :filters="filters" :categories="categories" />
    <FirstPost v-if="posts.data[0]" :post="posts.data[0]"></FirstPost>
    <Posts :posts="posts"/>
    <Pagination v-if="posts.data[0]" class="mt-10 lg:p-2 p-1 border rounded-4xl bg-gray-800 text-white" :links="posts.links" />

    <div
        v-else
        class="border border-teal-300 rounded-4xl bg-gray-100 text-lg font-bold text-teal-700 text-center p-10 mt-48 max-w-md mx-auto"
    >
        There are nothing to show.
    </div>
</template>

<script setup>
import Pagination from "../Shared/Pagination"
import FirstPost from "../Shared/Posts/FirstPost";
import Posts from "../Shared/Posts";
import Header from "../Shared/Header";
defineProps({
    'posts' : Object,
    'filters': Object,
    'categories': Object,
})
</script>

<style scoped>

</style>
