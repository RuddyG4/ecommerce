<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';

const showModal = ref(false);

const props = defineProps({
    branches: Object,
    products: Object,
    defaultBranch: Object,
    notIncludedProducts: Object
});

let products = ref(props.products);
let notIncludedProducts = ref(props.notIncludedProducts);

const form = useForm({
    branch_id: props.defaultBranch.id,
    product_id: -1,
    stock: '0',
    sale_price: '0',
    purchase_price: '0'
});

function updateBranchData() {
    // Realiza una solicitud a la API para obtener los datos de la sucursal
    fetch(`/api/inventory/${form.branch_id}`)
        .then(response => response.json())
        .then(data => {
            // Actualiza los datos del script
            products.value = data.products;
            notIncludedProducts.value = data.notIncludedProducts;
        });
}

function submit() {
    form.post(route('inventory.store'), {
        onFinish: () => {
            form.reset('product_id', 'stock', 'sale_price', 'purchase_price')
            updateBranchData();
        }
    });
    showModal.value = false;
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
                        <div class="my-4 flex justify-between">
                            <div>
                                <label for="branch_id" class="mr-2"><b>Sucursal actual:</b></label>
                                <select v-model="form.branch_id" id="branch_id"
                                    class="py-1 mr-2 text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    @change="updateBranchData">
                                    <option v-for="branch in branches" :key="branch.id" :value="branch.id">
                                        {{ branch.branch_name }}
                                    </option>
                                </select>
                            </div>

                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" @click="showModal = true"
                                :disabled="form.processing">
                                Add product
                            </PrimaryButton>
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
                                <tr v-for="product in products" :key="product.id">
                                    <td class="p-2 whitespace-nowrap">{{ product.product.product_name }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.stock }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.sale_price }}</td>
                                    <td class="p-2 whitespace-nowrap">{{ product.purchase_price }}</td>
                                    <td>
                                        <Link :href="route('inventory.show', { inventory: product.id })"
                                            class="bg-blue-200 text-slate-800 font-bold py-1 px-4 rounded mr-2">
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

        <!-- Modal -->
        <Modal :show="showModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Add product to branch "{{ branches[form.branch_id - 1].branch_name }}"
                </h2>
            </div>
            <div class="mx-6">
                <!-- modal body -->
                <div v-if="notIncludedProducts.length > 0" class="flex flex-col gap-4">
                    <div>
                        <label for="product_id" class="mr-2 text-sm">Producto</label>
                        <select v-model="form.product_id" id="product_id"
                            class="mr-2 text-sm w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            @change="updateBranchData">
                            <option value="-1">select a product</option>
                            <option v-for="p in notIncludedProducts" :key="p.id" :value="p.id">
                                {{ p.product_name }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.product_id" />
                    </div>

                    <div>
                        <InputLabel for="stock" value="Stock" />
                        <TextInput id="stock" v-model="form.stock" type="number" step="0.01" class="mt-1 block w-full"
                            required autocomplete="stock" />
                        <InputError class="mt-2" :message="form.errors.stock" />
                    </div>

                    <div>
                        <InputLabel for="sale_price" value="Product sale price (Bs)" />
                        <TextInput id="sale_price" v-model="form.sale_price" type="number" step="0.01"
                            class="mt-1 block w-full" required autocomplete="sale_price" />
                        <InputError class="mt-2" :message="form.errors.sale_price" />
                    </div>

                    <div>
                        <InputLabel for="purchase_price" value="Product purchase price (Bs)" />
                        <TextInput id="purchase_price" v-model="form.purchase_price" type="number" step="0.01"
                            class="mt-1 block w-full" required autocomplete="purchase_price" />
                        <InputError class="mt-2" :message="form.errors.purchase_price" />
                    </div>

                </div>
                <div v-else class="flex flex-col gap-4">
                    <p>No products available</p>
                </div>
            </div>
            <div class="p-3 mt-6 flex justify-end gap-2">
                <SecondaryButton @click="showModal = false">
                    Cancel
                </SecondaryButton>

                <PrimaryButton @click="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Product
                </PrimaryButton>
            </div>
        </Modal>
    </AppLayout>
</template>
