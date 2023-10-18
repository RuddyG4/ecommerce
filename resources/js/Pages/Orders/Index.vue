<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    orders: Object,
});

</script>

<template>
    <AppLayout title="Orders">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Orders
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-black bg-gray-50 text-left">
                                <tr class="rounded-tl rounded-tr">
                                    <th class="p-2 whitespace-nowrap rounded-tl">Name</th>
                                    <th class="p-2 whitespace-nowrap">Email</th>
                                    <th class="p-2 whitespace-nowrap">State</th>
                                    <th class="p-2 whitespace-nowrap">Total</th>
                                    <th class="p-2 whitespace-nowrap">Date</th>
                                    <th class="p-2 whitespace-nowrap rounded-tr">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr v-for="order in orders.data" :key="order.id">
                                    <td class="p-2 whitespace-nowrap">{{ order.first_name + ' ' + order.last_name}}</td>
                                    <td class="p-2 whitespace-nowrap">{{ order.guest_email }}</td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium" 
                                        :class="{
                                            'text-yellow-500': order.latest_tracking.tracking_name == 'Sin procesar',
                                            'text-blue-300': order.latest_tracking.tracking_name == 'Procesando',
                                            'text-blue-500': order.latest_tracking.tracking_name == 'En delivery',
                                            'text-green-500': order.latest_tracking.tracking_name == 'Completado'}">
                                            {{ order.latest_tracking.tracking_name }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">{{ order.total }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ order.order_date }}</td>
                                    <td>
                                        <Link :href="route('orders.show', { order: order.id })" class="bg-blue-200 text-slate-800 font-bold py-1 px-4 rounded mr-2')">
                                        View <i class="fa-solid fa-eye"></i>
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
