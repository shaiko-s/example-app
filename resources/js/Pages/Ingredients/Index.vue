<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    message: '',
});
</script>

<script>
export default {
    layout: AuthenticatedLayout,
};
</script>

<template>

    <Head title="Ingredients" />

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form @submit.prevent="form.post(route('ingredients.store'), { onSuccess: () => form.reset() })">
            <textarea v-model="form.message"
                      placeholder="Name of the ingredient"
                      class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
            <InputError :message="form.errors.message"
                        class="mt-2" />
            <PrimaryButton class="mt-4">Create</PrimaryButton>
        </form>
    </div>
</template>
