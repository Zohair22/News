<template>
    <article
        class="border border-teal-300 rounded-4xl lg:p-5 bg-gray-50 my-8 transition duration-700 transform hover:-translate-y-5 hover:bg-gray-200">

        <div class="lg:py-6 lg:px-5 lg:flex md:flex">
            <div class="lg:flex-1 md:flex-1 lg:mr-8 md:mr-8">
                <post-photo :post="post" />
            </div>

            <div class="flex-1 flex flex-col justify-between p-5">
                <post-header :post="post" />

                <div class="text-sm text-gray-500 mt-2 mb-6">
                    <h1 class="text-lg font-bold text-gray-800 mb-1">Post Excerpt</h1>
                    {{ post.excerpt }}
                </div>

                <post-footer :post="post" />
            </div>
        </div>
    </article>
</template>


<script setup>
import PostFooter from "../Shared/PostFooter";
import PostPhoto from "./PostPhoto";
import PostHeader from "./PostHeader";
defineProps({
    'post' : Array,
})
</script>

<style scoped>

</style>
