<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {ref } from 'vue';

const props = defineProps({
    branches: Object,
    products: Object,
    defaultBranch: Object,
});

let productRef = ref(props.products);

const form = useForm({
    branch_id: props.defaultBranch.id,
});

function updateBranchData() {
    // Obtiene el ID de la sucursal seleccionada
    const branchId = form.branch_id;

    // Realiza una solicitud a la API para obtener los datos de la sucursal
    fetch(`/api/inventory/${branchId}`)
        .then(response => response.json())
        .then(data => {
            // Actualiza los datos del script
            productRef.value = data.products;
        });
}

</script>

<template>
    <AppLayout title="Inventory">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Inventory
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <div class="my-4">
                            <label for="branch_id" class="mr-2">Sucursal actual</label>
                            <select v-model="form.branch_id" id="branch_id"
                                class="w-1/2 mr-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                @change="updateBranchData">
                                <option v-for="branch in branches" :key="branch.id" :value="branch.id">
                                    {{ branch.branch_name }}
                                </option>
                            </select>

                            <InputError class="mt-2" :message="form.errors.branch_id" />
                        </div>

                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-black bg-gray-50 text-left">
                                <tr class="rounded-tl rounded-tr">
                                    <th class="p-2 whitespace-nowrap rounded-tl">Product name</th>
                                    <th class="p-2 whitespace-nowrap">Stock</th>
                                    <th class="p-2 whitespace-nowrap">Sale price</th>
                                    <th class="p-2 whitespace-nowrap">Purchase price</th>
                                    <th class="p-2 whitespace-nowrap rounded-tr">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr v-for="product in productRef" :key="product.id">
                                    <td class="p-2 whitespace-nowrap">{{ product.product.product_name }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.stock }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.sale_price }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.purchase_price }}</td>
                                    <td>
                                        <Link :href="route('inventory.show', { inventory: product.id })"
                                            class="bg-blue-200 text-slate-800 font-bold py-1 px-4 rounded mr-2')">
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
