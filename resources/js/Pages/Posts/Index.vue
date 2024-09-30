<script setup>
import { defineProps } from 'vue';

import { usePage } from '@inertiajs/vue3';

// Access shared data from Inertia
const { auth } = usePage().props;

const props = defineProps({
    posts: {
        type: Object,
    },
});
</script>



<template>
    <div>
        <h1>Posts</h1>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <h2>{{ post.title }}</h2>
                <p>{{ post.content }}</p>
            </li>
        </ul>
        <p v-if="auth.user">Welcome, {{ auth.user.name }}!</p>
        <p v-else>Please log in.</p>

    </div>
</template>

