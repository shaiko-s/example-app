<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

// Define props
const props = defineProps({
    pagination: Object,
});
</script>

<template>
    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6 mb-6">
        <Link :href="pagination.prev_page_url || '#'"

              class="flex items-center px-5 py-2 text-sm  capitalize transition-colors duration-200  border rounded-md gap-x-2"
              :class="!pagination.prev_page_url
                    ? 'text-gray-500 bg-white dark:bg-gray-600 dark:text-gray-500 dark:border-gray-700 cursor-default'
                    : 'text-gray-500 bg-white dark:bg-gray-900 dark:hover:bg-gray-700 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100'">
        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24"
             stroke-width="1.5"
             stroke="currentColor"
             class="w-5 h-5 rtl:-scale-x-100">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>

        <span>
            previous
        </span>
        </Link>

        <div class="items-center hidden lg:flex gap-x-3">
            <Link v-for="(link, index) in pagination.links.slice(1, -1)"
                  :key="index"
                  :href="link.url"
                  class="px-2 py-1 text-sm rounded-md"
                  :class="link.active
                    ? 'text-blue-500 dark:bg-gray-900 bg-blue-100/60 cursor-default'
                    : 'text-gray-500 dark:hover:bg-gray-700 dark:text-gray-300 hover:bg-gray-100'">
            {{ link.label }}
            </Link>
        </div>

        <Link :href="pagination.next_page_url || '#'"
        class="flex items-center px-5 py-2 text-sm  capitalize transition-colors duration-200  border rounded-md gap-x-2"
              :class="!pagination.next_page_url
                    ? 'text-gray-500 bg-white dark:bg-gray-600 dark:text-gray-500 dark:border-gray-700 cursor-default'
                    : 'text-gray-500 bg-white dark:bg-gray-900 dark:hover:bg-gray-700 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100'">
        <span>
            Next
        </span>

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24"
             stroke-width="1.5"
             stroke="currentColor"
             class="w-5 h-5 rtl:-scale-x-100">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
        </svg>
        </Link>
    </div>
</template>
