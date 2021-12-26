<template>

    <div class="lg:grid lg:grid-cols-8 justify-between items-center lg:mt-8 mt-4 ">
        <div class="flex items-center text-sm max-w-12 lg:col-span-5">
            <img src="/storage/images/lary-avatar.svg" alt="Lary avatar" width="40" height="40">
            <div class="ml-1">
                <h5 class="font-bold"><Link href="#">{{ post.admin.name }}</Link></h5>
            </div>
        </div>
        <div
            class="lg:block lg:col-span-3 lg:mt-0 mt-2 text-center"
            v-if="!bottomActive"
        >
            <Link
                :href="'/post/'+post.slug"
                class="text-center duration-700 text-xs hover:text-white font-semibold bg-teal-300 transition hover:bg-teal-600 rounded-full py-2 px-5"
            >
                Read More
                <i class="fas fa-arrow-right ml-1 animate-bounceInLeft"></i>
            </Link>
        </div>
    </div>
</template>

<script setup>
defineProps({
    post: Array,
    bottomActive: Boolean,
})
</script>

<style scoped>

</style>
