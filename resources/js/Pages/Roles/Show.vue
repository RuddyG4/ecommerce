<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { computed } from 'vue';

const props = defineProps({
    role: Object,
});

const form = useForm({
    role_name: props.role.name,
    role_description: props.role.description
});

const disableSubmit = computed(() => {
    return (
        props.role.name !== form.role_name ||
        props.role.description !== form.role_description
    );
});

function submit() {
    form.put(route('roles.update', { role: props.role.id }));
}

</script>

<template>
    <AppLayout title="Show role">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Show role
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="role_name" value="Role name" />
                                <TextInput id="role_name" v-model="form.role_name" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="role_name" />
                                <InputError class="mt-2" :message="form.errors.role_name" />
                            </div>

                            <div>
                                <InputLabel for="role_description" value="Description" />
                                <TextInput id="role_description" v-model="form.role_description" type="text" class="mt-1 block w-full"
                                    required autocomplete="role_description" />
                                <InputError class="mt-2" :message="form.errors.role_description" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing, 'opacity-25': !disableSubmit }"
                                    :disabled="!disableSubmit || form.processing">
                                    Save changes
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>