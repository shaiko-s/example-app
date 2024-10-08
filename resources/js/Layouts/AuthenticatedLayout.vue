<script setup>
import { ref } from 'vue';
import MenuPrimaryNavigation from '@/Components/MenuPrimaryNavigation.vue';
import MenuResponsiveNavigation from '@/Components/MenuResponsiveNavigation.vue';

const showingNavigationDropdown = ref(false);

const toggleNavigationDropdown = () => {
    showingNavigationDropdown.value = !showingNavigationDropdown.value;
};

const menu = [
    { name: 'Dashboard', route: 'dashboard' },
    { name: 'Chirps', route: 'chirps.index' },
    { name: 'Ingredients', route: 'ingredients.index' },
    { name: 'Semiproducts', route: 'semiproducts' },
    { name: 'Products', route: 'products', },
    // Add more menu items as needed
];

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800">

                <!-- Primary Navigation Menu -->
                <MenuPrimaryNavigation v-model:activeLink="activeLink"
                                       :menu="menu"
                                       :showingNavigationDropdown="showingNavigationDropdown"
                                       @toggle-navigation-dropdown="toggleNavigationDropdown" />

                <!-- Responsive Navigation Menu -->
                <MenuResponsiveNavigation v-model:activeLink="activeLink"
                                          :menu="menu"
                                          :showingNavigationDropdown="showingNavigationDropdown" />
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow dark:bg-gray-800"
                    v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
