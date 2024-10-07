<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Header from '@/Components/Header.vue';
import { useForm, Head, usePage, Link } from '@inertiajs/vue3';
// import { capitalizeFirstLetter } from '@/Composable/useStringUtils.js';
import Ingredient from '@/Components/Ingredient.vue';
import FormCreateOneField from '@/Components/FormCreateOneField.vue';
import Pagination from '@/Components/Pagination.vue';
import WrapperPrimary from '@/Components/WrapperPrimary.vue';
import WrapperTable from '@/Components/WrapperTable.vue';
import TableHead from '@/Components/TableHead.vue';
import SectionHeader from '@/Components/SectionHeader.vue';

defineProps({
    ingredients: Object,
});

const form = useForm({
    name: '',
});

const page = usePage();

// const pageName = capitalizeFirstLetter(page.url.replace(/^\/+/, ''));

// Extract the first word from the Component name
const pageName = page.component.split('/')[0];

console.log(pageName);
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

            <SectionHeader :title="pageName" :total="ingredients.total" />

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
                                    :ingredient="ingredient" />
                    </tbody>
                </table>
            </WrapperTable>

            <Pagination :pagination="ingredients" />

        </section>
    </WrapperPrimary>

</template>
