<template>
    <header class="mt-5 text-center rounded-4xl p-5">

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
            <!--  Category -->
            <div class="relative lg:flex lg:inline-flex lg:items-center bg-gray-100 rounded-xl">
                <div>
                    <button
                        @click="open = !open"
                        id="dropdownButton"
                        data-dropdown-toggle="dropdown"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                        type="button"
                    >
                        Categories
                        <svg
                            class="w-4 h-4 ml-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            ></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div
                        id="dropdown"
                        :class="open ? '' : 'hidden'"
                        class="py-1 absolute items-center mt-1 bg-white rounded-xl w-full z-50 overflow-auto max-h-52"
                    >
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li v-for="category in categories">
                                <Link
                                    :href="'/news?category='+category.name"
                                    class="text-sm hover:bg-gray-50 border-b hover:text-teal-800 text-teal-400 block px-4 py-2"
                                    v-model="filters.category"
                                >
                                    {{ category.name }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-4xl px-3 py-2">
                <input type="hidden" v-model="category" name="category">
                <input
                    v-model="search"
                    type="text"
                    name="search"
                    placeholder="Search..."
                    class="border py-1 px-3 rounded-2xl shadow-xl"
                >
            </div>
        </div>
    </header>
</template>

<script setup>

import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import debounce from "lodash/debounce";

let props = defineProps({
    filters: Object,
    categories: Object,
    open: false,
});

let search = ref(props.filters.search);
let category = ref(props.filters.category);

watch(search, debounce(function (value) {
    Inertia.get('/news',{search: value}, {
        preserveState: true,
        replace: true
    });
}, 300));

watch(category, debounce(function (value) {
    Inertia.get('/news?category='+category,{category: value}, {
        preserveState: true,
        replace: true
    });
}, 300));
</script>

<style scoped>

</style>
