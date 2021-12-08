<template>
    <Head>
        <title>Home</title>
    </Head>

    <FirstPost :post="posts.data[0]" ></FirstPost>
    <Posts :posts="posts" />
</template>

<script setup>
import FirstPost from "../Shared/Posts/FirstPost";
import Posts from "../Shared/Posts";
defineProps({
    'posts' : Object
})
</script>

<style scoped>

</style>
