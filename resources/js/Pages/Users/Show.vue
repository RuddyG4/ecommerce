<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { computed } from 'vue';

const props = defineProps({
    roles: Object,
    user: Object,
});

const form = useForm({
    first_name: props.user.customer.first_name,
    last_name: props.user.customer.last_name,
    email: props.user.email,
    role_id: props.user.role.id,
});

const disableSubmit = computed(() => {
    return (
        props.user.customer.first_name !== form.first_name ||
        props.user.customer.last_name !== form.last_name ||
        props.user.email !== form.email ||
        props.user.role.id !== form.role_id
    );
});

function submit() {
    form.put(route('users.update', { user: props.user.id }));
}

</script>

<template>
    <AppLayout title="Show user">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Show user
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="first_name" value="First name" />
                                <TextInput id="first_name" v-model="form.first_name" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="first_name" />
                                <InputError class="mt-2" :message="form.errors.first_name" />
                            </div>

                            <div>
                                <InputLabel for="last_name" value="Last name" />
                                <TextInput id="last_name" v-model="form.last_name" type="text" class="mt-1 block w-full"
                                    required autocomplete="last_name" />
                                <InputError class="mt-2" :message="form.errors.last_name" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                                    autocomplete="username" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="role_id" value="Role" />
                                <select v-model="form.role_id" id="role_id"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option v-for="role in roles" :key="role.id" :value="role.id" :selected="role.id == form.role_id">
                                        {{ role.name }}
                                    </option>
                                </select>
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