<template>

    <article class="border border-teal-300 rounded-4xl lg:p-5 bg-gray-50 my-6">
        <div class="lg:py-6 lg:flex items-center">
            <div class="lg:flex-1 lg:mr-8">
                <post-photo :post="post" />
            </div>
            <div class="flex-1 flex flex-col justify-between p-5">
                <post-header :post="post" />
                <post-body :post="post" :bodyActive="bodyActive" />
                <post-footer :post="post" :bottomActive="!bottomActive" />
            </div>
        </div>
    </article>
    <CommentPost :post="post" :auth="auth" :errors="errors"></CommentPost>
</template>

<script setup>
import CommentPost from "../../Shared/PostComments";
import PostFooter from "../../Shared/Posts/PostFooter";
import PostHeader from "../../Shared/Posts/PostHeader";
import PostBody from "../../Shared/Posts/PostBody"
import PostPhoto from "../../Shared/Posts/PostPhoto";

defineProps({
    'post' : Object,
    'auth' : Object,
    'errors': Object,
    'bottomActive': Boolean,
    'bodyActive': Boolean,
})

</script>

<style scoped>

</style>
