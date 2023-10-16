<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    role_name: '',
    role_description: '',
});

function submit() {
    form.post(route('roles.store'));
}

</script>

<template>
    <AppLayout title="Create role">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create role
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
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Create user
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>