<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    branch_name: '',
    address: '',
    city_id: '',
});

defineProps({
    cities: Object,
});

function submit() {
    form.post(route('branches.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
}

</script>

<template>
    <AppLayout title="Create Branch">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Branch
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="branch_name" value="Branch name" />
                                <TextInput id="branch_name" v-model="form.branch_name" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="branch_name" />
                                <InputError class="mt-2" :message="form.errors.branch_name" />
                            </div>

                            <div>
                                <InputLabel for="address" value="Address" />
                                <TextInput id="address" v-model="form.address" type="text" class="mt-1 block w-full"
                                    required autocomplete="address" />
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="city_id" value="City" />
                                <select v-model="form.city_id" id="city_id"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option v-for="city in cities" :key="city.id" :value="city.id" :selected="city.id == form.city_id">
                                        {{ city.city_name }}
                                    </option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Create branch
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>