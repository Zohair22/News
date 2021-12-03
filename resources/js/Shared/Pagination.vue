<template>
    <div class="lg:max-w-3xl max-w-sm  mx-auto">
        <template v-for="link in links">
            <Link
                class="px-3 transition duration-1000 hover:font-bold hover:text-blue-500 hover:text-lg"
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
                  :class="{'font-bold text-blue-500 text-lg' : link.active}"/>
        </template>
    </div>
</template>

<script setup>
defineProps({
    links: Array,
})
</script>

<style scoped>
</style>
