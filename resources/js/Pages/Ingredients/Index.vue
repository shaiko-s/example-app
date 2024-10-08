<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Header from '@/Components/Header.vue';
import { useForm, Head, usePage, router} from '@inertiajs/vue3';
import { defineProps, ref } from 'vue';
import { provide } from 'vue';
// import { capitalizeFirstLetter } from '@/Composable/useStringUtils.js';
import Ingredient from '@/Components/Ingredient.vue';
import FormCreateOneField from '@/Components/FormCreateOneField.vue';
import Pagination from '@/Components/Pagination.vue';
import WrapperPrimary from '@/Components/WrapperPrimary.vue';
import WrapperTable from '@/Components/WrapperTable.vue';
import TableHead from '@/Components/TableHead.vue';
import SectionHeader from '@/Components/SectionHeader.vue';

const props = defineProps({
    ingredients: Object,
    itemsPerPage: Number,
});

const form = useForm({
    name: '',
});

const page = usePage();

// Extract the first word from the Component name
const pageName = page.component.split('/')[0];

// Define the current page state
const currentPage = ref(props.ingredients.current_page);
provide('currentPage', currentPage.value);

// Handle items per page change
const handleItemsPerPageChange = (event) => {
    // Reload data based on the new items per page
    router.get(route('ingredients.index'), { itemsPerPage: Number(event.target.value) });
};
</script>

<script>
export default {
    layout: AuthenticatedLayout,
};
</script>

<template>

    <Head :title="pageName" />

    <Header :title="pageName" />

    <WrapperPrimary>

        <!-- Create form -->
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <FormCreateOneField route-name="ingredients.store"
                                placeholder-text="Name of the ingredient"
                                button-text="Create" />
        </div>

        <!-- Ingredients section -->
        <section class="container px-4 mx-auto">

            <div class="flex justify-between">
                <SectionHeader :title="pageName" :total="ingredients.total" />
                <!-- Items per page dropdown -->
                <div class="mt-4">
                    <label for="itemsPerPage" class="mr-2 dark:text-gray-400">Items per page:</label>
                    <!-- <select id="itemsPerPage" v-model="itemsPerPage" @change="handleItemsPerPageChange" class="border w-16 h-10 rounded p-2"> -->
                    <select id="itemsPerPage" :value="itemsPerPage" @change="handleItemsPerPageChange" class="border w-16 h-10 rounded p-2">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>

            <WrapperTable>

                <!-- Table -->
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                    <!-- Table head -->
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <TableHead :heads="[{ checkbox: true, button: true, title: 'Name', az: true, crud: false },
                                            { checkbox: false, button: true, title: 'Created by', az: false, crud: false  },
                                            { checkbox: false, button: false, title: 'Created at', az: false, crud: false  },
                                            { checkbox: false, button: false, title: 'Edit', az: false, crud: true }
                        ]" />
                    </thead>

                    <!-- Table body -->
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        <Ingredient v-for="ingredient in ingredients.data"
                                    :key="ingredient.id"
                                    :ingredient="ingredient"
                                    :current-page="currentPage" />
                    </tbody>

                </table>

            </WrapperTable>

            <Pagination :pagination="ingredients" :current-page="currentPage" />

        </section>

    </WrapperPrimary>

</template>
