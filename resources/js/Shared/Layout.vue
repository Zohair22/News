<template>
    <Head>
        <title>News</title>
    </Head>
    <Navigation />
    <section class="p-5">
        <div class="max-w-4xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Navigation from "./Navigation";

export default {
    components: { Navigation, Head },
};
</script>

<style scoped>

</style>
