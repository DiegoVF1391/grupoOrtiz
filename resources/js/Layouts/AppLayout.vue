<template>
    <div class="min-h-screen flex flex-col bg-gray-100">
        <header class="bg-blue-600 text-white p-4 shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold">Gestión de Productos</h1>
                <nav class="space-x-4">
                    <router-link href="/products" class="hover:text-blue-300">Productos</router-link>
                    <router-link href="/pokemon" class="hover:text-blue-300">Consulta Pokémon</router-link>
                </nav>
            </div>
        </header>
        <main class="flex-grow container mx-auto p-4">
            <slot />
        </main>
        <footer class="bg-blue-600 text-white p-4 text-center">
            <p>&copy; 2024 Mi Aplicación. Todos los derechos reservados.</p>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'AppLayout',
};
</script>

<link rel="stylesheet" href="{{ mix('/css/app.css') }}"></link>