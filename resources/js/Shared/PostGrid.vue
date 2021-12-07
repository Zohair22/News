<template>

    <article
        class="border border-teal-300 rounded-4xl bg-gray-50 transition duration-700 transform hover:-translate-y-5 hover:bg-gray-200">
        <post-photo :post="post" />

        <div class="py-8 px-5">
            <div class="flex flex-col justify-between">
                <post-header :post="post" />
                <div class="text-sm text-gray-500 mt-2 mb-6">
                    <h1 class="text-lg font-bold text-gray-800 mb-1">Post Excerpt</h1>
                    {{ post.excerpt }}
                </div>
            </div>
            <post-footer :post="post" />
        </div>
    </article>


</template>

<script setup>
import PostFooter from "../Shared/PostFooter";
import PostHeader from "../Shared/PostHeader";
import PostPhoto from "./PostPhoto";

defineProps({
    'post' : Array,
})
</script>

<style scoped>

</style>
