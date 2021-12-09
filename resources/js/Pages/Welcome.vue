<template>
    <Head>
        <title>Home</title>
    </Head>
    <Header :filters="filters" :categories="categories" />
    <FirstPost :post="posts.data[0]" ></FirstPost>
    <Posts :posts="posts" />
</template>

<script setup>
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
