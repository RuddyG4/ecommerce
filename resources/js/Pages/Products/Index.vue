<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    products: Object,
});

</script>

<template>
    <AppLayout title="Products">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <Link :href="route('products.create')">
                        <PrimaryButton type="button" class="mb-6">
                            Create product
                        </PrimaryButton>
                        </Link>

                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-black bg-gray-50 text-left">
                                <tr class="rounded-tl rounded-tr">
                                    <th class="p-2 whitespace-nowrap rounded-tl">Product</th>
                                    <th class="p-2 whitespace-nowrap">description</th>
                                    <th class="p-2 whitespace-nowrap">state</th>
                                    <th class="p-2 whitespace-nowrap">product type</th>
                                    <th class="p-2 whitespace-nowrap rounded-tr">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr v-for="product in products.data" :key="product.id">
                                    <td class="p-2 whitespace-nowrap">
                                        <img :src="'storage/' + product.image_path" :alt="product.product_name" class="w-12 inline-block rounded mr-2">
                                        <Link :href="route('products.show', { product: product.id })" class="font-bold py-1 px-4 rounded mr-2">
                                            <b class="cursor-pointer"><u>{{ product.product_name }}</u></b>
                                        </Link>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">{{ product.description }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.state == 0 ? 'Active' : 'Inactive' }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.product_type.name }}</td>
                                    <td>
                                        <Link :href="route('products.show', { product: product.id })" class="bg-blue-200 text-slate-800 font-bold py-1 px-4 rounded mr-2">
                                        Show <i class="fa-solid fa-eye"></i>
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
