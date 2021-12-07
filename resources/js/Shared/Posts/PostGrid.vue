<template>

    <article
        class="border border-teal-300 rounded-4xl bg-gray-50 transition duration-700 transform hover:-translate-y-5 hover:bg-gray-200">
        <post-photo :post="post" />

        <div class="py-8 px-5">
            <div class="flex flex-col justify-between">
                <post-header :post="post" />
                <post-body :post="post" :body-active="!bodyActive"/>
                <post-footer :post="post" />
            </div>
        </div>
    </article>


</template>

<script setup>
import PostFooter from "./PostFooter";
import PostHeader from "./PostHeader";
import PostPhoto from "./PostPhoto";
import PostBody from "./PostBody";

defineProps({
    'post' : Array,
    'bodyActive' : Boolean,
})
</script>

<style scoped>

</style>
