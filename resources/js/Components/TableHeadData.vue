<script setup>
import { computed } from 'vue';

const props = defineProps({
    head: Object,
})

const classes = computed(() =>
    !props.head.crud
        ? 'px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400'
        : 'relative py-3.5 px-4',
);
</script>

<template>
    <th scope="col"
        :class="classes">
        <slot />
    </th>
</template>
