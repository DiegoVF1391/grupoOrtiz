<template>
    <AppLayout>
        <div class="container mx-auto py-6">
            <h2 class="text-2xl font-bold mb-6">{{ isEdit ? 'Editar Producto' : 'Crear Producto' }}</h2>
            
            <form @submit.prevent="submit" class="space-y-4 bg-white p-6 rounded-md shadow-md">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nombre:</label>
                    <input 
                        v-model="form.name" 
                        type="text" 
                        required 
                        class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-600"
                    />
                </div>
                
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Descripción:</label>
                    <textarea 
                        v-model="form.description" 
                        required 
                        class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-600"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Precio:</label>
                    <input 
                        v-model="form.price" 
                        type="number" 
                        min="0" 
                        step="0.01" 
                        required 
                        class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-600"
                    />
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Stock:</label>
                    <input 
                        v-model="form.stock" 
                        type="number" 
                        min="0" 
                        required 
                        class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-600"
                    />
                </div>

                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200 w-full mt-4"
                >
                    Guardar
                </button>
            </form>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent, reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

export default defineComponent({
    components: { AppLayout },
    props: {
        product: Object,
    },
    setup(props) {
        const isEdit = !!props.product;
        const form = reactive({
            name: props.product?.name || '',
            description: props.product?.description || '',
            price: props.product?.price || 0,
            stock: props.product?.stock || 0,
        });

        const submit = () => {
            if (isEdit) {
                router.put(`/products/${props.product.id}`, form);
            } else {
                router.post('/products', form);
            }
        };

        return { form, submit, isEdit };
    },
});
</script>
