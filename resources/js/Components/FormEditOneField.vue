<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, ref, watch } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from './SecondaryButton.vue';


// Props
const props = defineProps({
    ingredient: Object,
    // editing: Boolean,
});

// Define the emit function
const emit = defineEmits(['update:editing', 'handleCancel']);

// Form setup
const form = useForm({
    name: props.ingredient.name,
});

// Watch for changes in the ingredient prop to reset the form
watch(() => props.ingredient, (newIngredient) => {
    form.reset({ name: newIngredient.name });
});

// Handle form submission
const handleSubmit = () => {
    form.put(route('ingredients.update', props.ingredient.id), {
        onSuccess: () => {
            form.reset();
            emit('update:editing', false);
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
