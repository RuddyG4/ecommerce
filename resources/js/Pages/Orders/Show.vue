<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { computed } from 'vue';

const props = defineProps({
    order: Object,
});

const form = useForm({
    tracking_name: '',
    tracking_description: '',
});

const disableSubmit = computed(() => {
    return (
        form.tracking_name !== '' &&
        form.tracking_description !== ''
    );
});

function submit() {
    form.put(route('orders.update', { order: props.order.id }));
}

</script>

<template>
    <AppLayout title="Show order">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Show order
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="first_name"><b>First name :</b> </label>
                            <span>{{ order.first_name }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="last_name"><b>Last name :</b> </label>
                            <span>{{ order.last_name }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="guest_email"><b>Email :</b> </label>
                            <span>{{ order.guest_email }}</span>
                        </div>
                        
                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="total"><b>Monto Total :</b> </label>
                            <span>Bs {{ order.total }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="order_date"><b>Order date :</b> </label>
                            <span> {{ order.order_date }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="city"><b>City :</b> </label>
                            <span> {{ order.city.city_name }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="shipping_address1"><b>Shipping address :</b> </label>
                            <span> {{ order.shipping_address1 }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="shipping_address2"><b>Shipping address 2 :</b> </label>
                            <span> {{ order.shipping_address2 == null ? 'N/A' : order.shipping_address2 }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="order_state"><b>Order state :</b> </label>
                            <span> {{ order.latest_tracking.tracking_name }}</span>
                        </div>

                        <div class="mt-4">
                            <label class="text-blue-400 mr-4" for="order_instructions"><b>Order instructions :</b>
                            </label>
                            <span> {{ order.order_instructions }}</span>
                        </div>

                        <div v-if="order.latest_tracking.tracking_name !== 'Completado'" class=" mt-4 border-t-2 py-4">
                            <label class="text-blue-400 mr-4" for="order_state">
                                <b class="uppercase">Cambiar estado del pedido</b>
                            </label>
                            <form @submit.prevent="submit" class="mt-2">
                                <div>
                                    <InputLabel for="tracking_name" value="Tracking name" />
                                    <TextInput id="tracking_name" v-model="form.tracking_name" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="tracking_name" />
                                    <InputError class="mt-2" :message="form.errors.tracking_name" />
                                </div>

                                <div>
                                    <InputLabel for="tracking_description" value="Tracking description" />
                                    <TextInput id="tracking_description" v-model="form.tracking_description" type="text"
                                        class="mt-1 block w-full" required autocomplete="tracking_description" />
                                    <InputError class="mt-2" :message="form.errors.tracking_description" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <PrimaryButton class="ml-4"
                                        :class="{ 'opacity-25': form.processing, 'opacity-25': !disableSubmit }"
                                        :disabled="!disableSubmit || form.processing">
                                        Save changes
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>