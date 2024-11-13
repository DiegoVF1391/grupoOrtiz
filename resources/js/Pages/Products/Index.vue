<template>
    <AppLayout>
        <div class="container mx-auto py-6">
            <h2 class="text-2xl font-bold mb-4">Lista de Productos</h2>
            
            <button 
                @click="$inertia.visit('/products/create')" 
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200 mb-4"
            >
                Agregar Producto
            </button>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-md shadow">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Nombre</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Descripción</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Precio</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Stock</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr 
                            v-for="product in products" 
                            :key="product.id" 
                            class="border-b hover:bg-gray-50 transition duration-200"
                        >
                            <td class="px-4 py-2">{{ product.name }}</td>
                            <td class="px-4 py-2">{{ product.description }}</td>
                            <td class="px-4 py-2">{{ product.price }}</td>
                            <td class="px-4 py-2">{{ product.stock }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <button 
                                    @click="$inertia.visit(`/products/${product.id}/edit`)" 
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition duration-200"
                                >
                                    Editar
                                </button>
                                <button 
                                    @click="deleteProduct(product.id)" 
                                    class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition duration-200"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';

export default defineComponent({
    components: { AppLayout },
    props: {
        products: Array,
    },
    methods: {
        deleteProduct(id) {
            this.$inertia.delete(`/products/${id}`);
        },
    },
});
</script>
