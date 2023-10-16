<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    users: Object,
});

</script>

<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                        <Link :href="route('users.create')">
                        <PrimaryButton type="button" class="mb-6">
                            Create user
                        </PrimaryButton>
                        </Link>


                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-black bg-gray-50 text-left">
                                <tr class="rounded-tl rounded-tr">
                                    <th class="p-2 whitespace-nowrap rounded-tl">First name</th>
                                    <th class="p-2 whitespace-nowrap">Last name</th>
                                    <th class="p-2 whitespace-nowrap">Email</th>
                                    <th class="p-2 whitespace-nowrap">Role</th>
                                    <th class="p-2 whitespace-nowrap rounded-tr">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td class="p-2 whitespace-nowrap">{{ user.customer.first_name }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ user.customer.last_name }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ user.email }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ user.role.name }}</td>
                                    <td>
                                        <Link :href="route('users.show', { user: user.id })" class="bg-blue-200 text-slate-800 font-bold py-1 px-4 rounded mr-2')">
                                        Edit
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
