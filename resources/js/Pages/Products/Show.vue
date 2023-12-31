<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';

const props = defineProps({
    product: Object,
    brands: Object,
    product_types: Object,
    vendors: Object,
    categories: Object,
});

const form = useForm({
    _method: 'put',
    product_name: props.product.product_name,
    product_description: props.product.description,
    product_image: '',
    state: props.product.state,
    weight: props.product.weight,
    brand_id: props.product.brand_id,
    product_type_id: props.product.product_type_id,
    vendor_id: props.product.vendor_id,
    category_id: props.product.category_id,
});

function submit() {
    form.post(route('products.show', { product: props.product.id }));
}

</script>

<template>
    <AppLayout title="Update Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Update product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg dark:text-white">
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="product_name" value="Product name" />
                                <TextInput id="product_name" v-model="form.product_name" type="text" class="mt-1 block w-full"
                                     autofocus autocomplete="product_name" />
                                <InputError class="mt-2" :message="form.errors.product_name" />
                            </div>

                            <div>
                                <InputLabel for="product_description" class="mt-2" value="Product description" />
                                <TextAreaInput id="product_description" v-model="form.product_description" type="text" class="mt-1 block w-full"
                                    required autocomplete="product_description" rows="3" />
                                <InputError class="mt-2" :message="form.errors.product_description" />
                            </div>
                            
                            <div>
                                <InputLabel for="product_image" class="my-2" value="Product image" />
                                <img :src="'/storage/' + product.image_path" :alt="product.product_name" class="w-1/5 mb-2 inline-block rounded mr-2">
                                <input id="product_image" @input="form.product_image = $event.target.files[0]" type="file" class="w-full mb-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            </div>

                            <div>
                                <InputLabel for="weight" value="Product weight (Kg)" />
                                <TextInput id="weight" v-model="form.weight" type="number" step="0.01" class="mt-1 block w-full"
                                     autocomplete="weight" />
                                <InputError class="mt-2" :message="form.errors.weight" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="state" value="State" />
                                <select v-model="form.state" id="state"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="false">Activo</option>
                                    <option value="true">Inactivo</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.state" />
                            </div>
                            
                            <div class="mt-4">
                                <InputLabel for="brand_id" value="Brand" />
                                <select v-model="form.brand_id" id="brand_id"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select a brand</option>
                                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                                        {{ brand.brand_name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.brand_id" />
                            </div>
                            
                            <div class="mt-4">
                                <InputLabel for="product_type_id" value="Product type" />
                                <select v-model="form.product_type_id" id="product_type_id"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select a product type</option>
                                    <option v-for="product_type in product_types" :key="product_type.id" :value="product_type.id">
                                        {{ product_type.name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.product_type_id" />
                            </div>
                            
                            <div class="mt-4">
                                <InputLabel for="vendor_id" value="Vendor" />
                                <select v-model="form.vendor_id" id="vendor_id"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select a vendor</option>
                                    <option v-for="vendor in vendors" :key="vendor.id" :value="vendor.id">
                                        {{ vendor.vendor_name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.vendor_id" />
                            </div>
                            
                            <div class="mt-4">
                                <InputLabel for="category_id" value="Category" />
                                <select v-model="form.category_id" id="category_id"
                                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select a category</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.category_name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.category_id" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Update product
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>