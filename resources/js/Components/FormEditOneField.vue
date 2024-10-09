<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { defineProps, ref, watch, inject } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from './SecondaryButton.vue';

// Props
const props = defineProps(['ingredient']);

// Inject the currentPage state
const currentPage = inject('currentPage');
const search = ref(inject('search'));

// Define the emit function
const emit = defineEmits(['handleSubmit', 'handleCancel']);

// Form setup
const form = useForm({
    name: props.ingredient.name,
    page: currentPage, // Include the current page number in the form data
    // search: search, // Include the search parameter in the form data
});

// Watch for changes in the ingredient prop to reset the form
watch(() => props.ingredient, (newIngredient) => {
    form.reset({ name: newIngredient.name});
});

// Handle form submission
const handleSubmit = () => {
    form.put(route('ingredients.update', props.ingredient.id, search), {
        onSuccess: () => {
            form.reset();
            emit('handleSubmit', false);
            router.get(route('ingredients.index'), { filters: props.filters });
        },
    });
};

// Handle cancel action
const handleCancel = () => {
    form.reset();
    form.clearErrors();
    emit('handleCancel', false);
};
</script>

<template>
    <form @submit.prevent="handleSubmit">
        <div class="flex space-x-2 items-center">
            <TextInput v-model="form.name"
                       class=" block w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </TextInput>
            <PrimaryButton>Save</PrimaryButton>
            <SecondaryButton type="button"
                    @click="handleCancel">Cancel
            </SecondaryButton>
        </div>
        <InputError :message="form.errors.name"
        class="mt-1" />
    </form>
</template>
