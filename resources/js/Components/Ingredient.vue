<script setup>
import FormEditOneField from './FormEditOneField.vue';
import dayjs from 'dayjs';
import { useForm, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Checkbox from './Checkbox.vue';
import TableData from './TableData.vue';
import IconEdit from './IconEdit.vue';
import IconDelete from './IconDelete.vue';

const props = defineProps(['ingredient']);

const form = useForm({
    name: props.ingredient.name,
});

const editing = ref(false);
</script>

<template>
    <tr>
        <!-- ingredient name / Form Editing -->
        <TableData>

            <!-- Form Editing -->
            <div v-if="editing">

                <FormEditOneField :ingredient="ingredient"
                                  @handleSubmit="editing = false"
                                  @handleCancel="editing = false" />
            </div>

            <!-- Ingredient name -->
            <div v-else
                 class="inline-flex items-center gap-x-3">
                <Checkbox :checked="ingredient.checked || false"
                          :value="ingredient.id"
                          @update:checked="ingredient.checked = $event" />
                <h2 class="font-medium text-gray-800 dark:text-white ml-2">
                    {{ ingredient.name }}</h2>
            </div>
        </TableData>

        <!-- user name -->
        <TableData>
            {{ ingredient.user.name }}
        </TableData>

        <!-- created at -->
        <TableData>
            {{ dayjs(ingredient.created_at).format('DD-MM-YYYY HH:mm') }}
            <small v-if="ingredient.created_at !== ingredient.updated_at"
                   class="text-sm text-gray-600"> &middot; edited</small>
        </TableData>

        <!-- edit - delete buttons -->
        <TableData>
            <div v-if="ingredient.user.id === $page.props.auth.user.id"
                 class="flex items-center gap-x-6">

                <!-- edit button-->
                <button class="text-gray-500 transition-colors duration-200
                            dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none"
                        @click="editing = !editing">
                    <IconEdit />
                </button>

                <!-- delete button-->
                <Link :href="route('ingredients.destroy', ingredient.id)"
                      as="button"
                      method="delete">
                <button
                        class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                    <IconDelete />
                </button>
                </Link>
            </div>
        </TableData>
    </tr>

</template>
