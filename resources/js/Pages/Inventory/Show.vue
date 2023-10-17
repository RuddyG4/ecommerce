<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { computed } from 'vue';

const props = defineProps({
    productInventory: Object,
});

const form = useForm({
    stock: props.productInventory.stock,
    sale_price: props.productInventory.sale_price,
    purchase_price: props.productInventory.purchase_price,
});

const disableSubmit = computed(() => {
    return (
        props.productInventory.stock !== form.stock ||
        props.productInventory.sale_price !== form.sale_price ||
        props.productInventory.purchase_price !== form.purchase_price
    );
});

function submit() {
    form.put(route('inventory.update', { inventory: props.productInventory.id }));
}

</script>

<template>
    <AppLayout title="Show Product Inventory">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Show Product Inventory
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <h2 class="font-semibold mb-4 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Product: {{ productInventory.product.product_name }}
                        </h2>

                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="stock" value="Stock" />
                                <TextInput id="stock" v-model="form.stock" type="text" class="mt-1 block w-full" required
                                    autofocus autocomplete="stock" />
                                <InputError class="mt-2" :message="form.errors.stock" />
                            </div>

                            <div>
                                <InputLabel for="sale_price" value="Sale price" />
                                <TextInput id="sale_price" v-model="form.sale_price" type="number" class="mt-1 block w-full"
                                    required autocomplete="sale_price" />
                                <InputError class="mt-2" :message="form.errors.sale_price" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="purchase_price" value="purchase_price" />
                                <TextInput id="purchase_price" v-model="form.purchase_price" type="number"
                                    class="mt-1 block w-full" required autocomplete="purchase_price" />
                                <InputError class="mt-2" :message="form.errors.purchase_price" />
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
    </AppLayout>
</template>