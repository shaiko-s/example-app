<script setup>
import { defineProps } from 'vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const props = defineProps({
    menu: Array,
    showingNavigationDropdown: Boolean,
    activeLink: String,
});

</script>

<template>
    <div :class="{
        block: showingNavigationDropdown,
        hidden: !showingNavigationDropdown,
    }"
         class="sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <ResponsiveNavLink v-for="item in menu"
                               @click="$emit('update:activeLink', item.route)"
                               :key="item.route"
                               :href="route(item.route)"
                               :active="route().current(item.route)">
                {{ item.name }}
            </ResponsiveNavLink>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">
                    {{ $page.props.auth.user.name }}
                </div>
                <div class="text-sm font-medium text-gray-500">
                    {{ $page.props.auth.user.email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('profile.edit')">
                    Profile
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('logout')"
                                   method="post"
                                   as="button">
                    Log Out
                </ResponsiveNavLink>
            </div>
        </div>
    </div>
</template>
