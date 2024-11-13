<template>
    <AppLayout>
        <div class="container mx-auto py-6">
            <h2 class="text-2xl font-bold mb-4">Consulta Pokémon</h2>

            <form @submit.prevent="fetchPokemon" class="flex items-center space-x-4 mb-6">
                <input 
                    v-model="pokemonName" 
                    placeholder="Ingresa el nombre del Pokémon"
                    class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-600"
                />
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Buscar
                </button>
            </form>

            <div v-if="pokemonData" class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold capitalize mb-4">{{ pokemonData.name }}</h3>
                <img :src="pokemonData.sprites.front_default" alt="Pokemon image" class="mx-auto" />
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import AppLayout from '@/Layouts/AppLayout.vue';

export default defineComponent({
    components: { AppLayout },
    setup() {
        const pokemonName = ref('');
        const pokemonData = ref(null);

        const fetchPokemon = async () => {
            try {
                const response = await axios.get(`/api/external-pokemon?name=${pokemonName.value}`);
                pokemonData.value = response.data;
            } catch (error) {
                console.error(error);
            }
        };

        return { pokemonName, fetchPokemon, pokemonData };
    },
});
</script>
