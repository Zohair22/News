<template>
    <Head>
        <title>News</title>
    </Head>
    <Navigation :user="user" />
    <section class="p-5">
        <div class="max-w-6xl mx-auto">
            <slot />
        </div>
    </section>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Navigation from "./Navigation";

export default {
    components: { Navigation, Head },
    props : {
        admin: Object,
        user: Array,
    }
};
</script>

<style scoped>

</style>
