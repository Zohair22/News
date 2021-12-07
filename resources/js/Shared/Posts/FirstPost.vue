<template>
    <article
        class="border border-teal-300 rounded-4xl p-5 bg-gray-50 my-8 transition duration-700 transform hover:-translate-y-5 hover:bg-gray-200"
    >
        <div class="lg:py-6 lg:px-5 lg:flex md:flex">
            <div class="lg:flex-1 md:flex-1 lg:mr-8 md:mr-8">
                <post-photo :post="post" />
            </div>
            <div class="flex-1 flex flex-col justify-between p-5">
                <post-header :post="post" />
                <post-body :post="post" :body-active="!bodyActive" />
                <post-footer :post="post" />
            </div>
        </div>
    </article>
</template>


<script setup>
import PostFooter from "./PostFooter";
import PostPhoto from "./PostPhoto";
import PostHeader from "./PostHeader";
import PostBody from "./PostBody";
defineProps({
    'post' : Array,
    bodyActive: Boolean
})
</script>

<style scoped>

</style>
