<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

// Props
const props = defineProps({
    routeName: String,
    placeholderText: String,
    buttonText: String,
});

// Form setup
const form = useForm({
    name: '',
});

// Handle form submission
const handleSubmit = () => {
    form.post(route(props.routeName), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <form @submit.prevent="handleSubmit">
        <TextInput v-model="form.name"
                   :placeholder="placeholderText"
                   class="block w-full h-10 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
        </TextInput>
        <InputError :message="form.errors.name"
                    class="mt-2" />
        <PrimaryButton class="mt-4">{{ buttonText }}</PrimaryButton>
    </form>
</template>
