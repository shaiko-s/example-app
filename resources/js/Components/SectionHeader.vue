<script setup>
defineProps({
    title: String,
    total: Number,
});

</script>

<template>
    <!-- Table head -->
    <div class="flex items-center gap-x-3">

        <!-- Title -->
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">
            {{ title }}
        </h2>

        <!-- Total ingredients -->
        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-900 dark:text-blue-400">
            {{ `${total} ${title.toLowerCase()}` }}
        </span>
    </div>
</template>
