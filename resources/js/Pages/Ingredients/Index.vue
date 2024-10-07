<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Header from '@/Components/Header.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, usePage, Link } from '@inertiajs/vue3';
import { capitalizeFirstLetter } from '@/Composable/useStringUtils.js';
import Ingredient from '@/Components/Ingredient.vue';
import TextInput from '@/Components/TextInput.vue';

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

</script>

<script>
export default {
    layout: AuthenticatedLayout,
};
</script>

<template>

    <Head :title="pageName" />

    <Header :title="pageName" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <!-- Create form -->
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    <form @submit.prevent="form.post(route('ingredients.store'), { onSuccess: () => form.reset() })">
                        <TextInput v-model="form.name"
                                   placeholder="Name of the ingredient"
                                   class="block w-full h-10 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </TextInput>
                        <InputError :name="form.errors.name"
                                    class="mt-2" />
                        <PrimaryButton class="mt-4">Create</PrimaryButton>
                    </form>
                </div>

                <!-- Ingredients list -->
                <section class="container px-4 mx-auto">
                    <div class="flex items-center gap-x-3">
                        <!-- Page title -->
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">{{ pageName }}</h2>

                        <span
                              class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-900 dark:text-blue-400">{{
                                ingredients.total }} ingredients</span>
                    </div>

                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                    <!-- Table -->
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <!-- Table head -->
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr>
                                                <!-- Name -->
                                                <th scope="col"
                                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <div class="flex items-center gap-x-3">
                                                        <input type="checkbox"
                                                               class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700"
                                                               id="all">
                                                        <button class="flex items-center gap-x-2">
                                                            <span class="ml-2">Name</span>

                                                            <!-- Icon A-Z -->
                                                            <svg class="h-3 w-3"
                                                                 viewBox="0 0 10 11"
                                                                 fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                                      fill="currentColor"
                                                                      stroke="currentColor"
                                                                      stroke-width="0.1" />
                                                                <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                                      fill="currentColor"
                                                                      stroke="currentColor"
                                                                      stroke-width="0.1" />
                                                                <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                                      fill="currentColor"
                                                                      stroke="currentColor"
                                                                      stroke-width="0.3" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <button class="flex items-center gap-x-2">
                                                        <span>Created by</span>

                                                        <!-- Icon Question mark -->
                                                        <!-- <svg xmlns="http://www.w3.org/2000/svg"
                                                             fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke-width="2"
                                                             stroke="currentColor"
                                                             class="w-4 h-4">
                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                        </svg> -->
                                                    </button>
                                                </th>

                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Created at</th>

                                                <th scope="col"
                                                    class="relative py-3.5 px-4">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <!-- Table body -->
                                        <tbody
                                               class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                            <Ingredient v-for="ingredient in ingredients.data"
                                                        :key="ingredient.id"
                                                        :ingredient="ingredient" />
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6 mb-6">
                        <Link :href="ingredients.prev_page_url || '#'"
                              class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
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
                            <Link v-for="(link, index) in ingredients.links.slice(1, -1)"
                                  :key="index"
                                  :href="link.url"
                                  class="px-2 py-1 text-sm rounded-md"
                                  :class="link.active
                                        ? 'text-blue-500 dark:bg-gray-900 bg-blue-100/60'
                                        : 'text-gray-500 dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'">
                            {{ link.label }}
                            </Link>
                        </div>

                        <Link :href="ingredients.next_page_url || '#'"
                           class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
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
                </section>
            </div>
        </div>
    </div>

</template>
