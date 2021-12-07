<template>

    <div class="grid grid-cols-8 justify-between items-center lg:mt-8 mt-4">
        <div class="flex items-center text-sm max-w-12  col-span-5">
            <img src="/storage/images/lary-avatar.svg" alt="Lary avatar">
            <div class="ml-1">
                <h5 class="font-bold"><Link href="#">{{ post.admin.name }}</Link></h5>
            </div>
        </div>
        <div
            class="lg:block col-span-3"
        >
            <Link
                :href="'/post/'+post.slug"
                class="text-center duration-700 text-xs hover:text-white font-semibold bg-teal-200 transition hover:bg-teal-500 rounded-full py-2 px-5"
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
})
</script>

<style scoped>

</style>
