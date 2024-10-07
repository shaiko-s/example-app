<script setup lang="ts">
import IconAZ from './IconA-Z.vue';
import TableHeadData from './TableHeadData.vue';
import Checkbox from './Checkbox.vue';
import { computed, defineProps } from 'vue';

const props = defineProps({
    heads: Array,
});

</script>

<template>
    <tr>

        <!-- Name -->
        <TableHeadData v-for="head in heads" :head="head">
            <div class="flex items-center gap-x-3">
                <Checkbox v-if="head.checkbox"
                          :checked="false"
                          @update:checked="" />
                <button v-if="head.button"
                        class="flex items-center gap-x-2">
                    <span class="ml-2">{{ head.title }}</span>

                    <IconAZ v-if="head.az" />
                </button>
                <span v-else :class="head.crud ? 'sr-only' : ''">
                    {{ head.title }}
                </span>
            </div>
        </TableHeadData>

        <!-- Created by user -->
        <!-- <th scope="col"
            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <button class="flex items-center gap-x-2">
                <span>Created by</span>
            </button>
        </th> -->

        <!-- Created at -->
        <!-- <th scope="col"
            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
            Created at</th> -->

        <!-- CRUD icons -->
        <!-- <th scope="col"
            class="relative py-3.5 px-4">
            <span class="sr-only">Edit</span>
        </th> -->
    </tr>

</template>
