<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    branches: Object,
});

</script>

<template>
    <AppLayout title="Branches">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Branches
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                        <Link :href="route('branches.create')">
                        <PrimaryButton type="button" class="mb-6">
                            Create branch
                        </PrimaryButton>
                        </Link>


                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-black bg-gray-50 text-left">
                                <tr class="rounded-tl rounded-tr">
                                    <th class="p-2 whitespace-nowrap rounded-tl">Branch name</th>
                                    <th class="p-2 whitespace-nowrap">Address</th>
                                    <th class="p-2 whitespace-nowrap">Email</th>
                                    <th class="p-2 whitespace-nowrap rounded-tr">city</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr v-for="branch in branches" :key="branch.id">
                                    <td class="p-2 whitespace-nowrap">{{ branch.branch_name }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ branch.address }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ branch.city.city_name }}</td>
                                    <td>
                                        <Link :href="route('branches.show', { branch: branch.id })" class="bg-blue-200 text-slate-800 font-bold py-1 px-4 rounded mr-2')">
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
