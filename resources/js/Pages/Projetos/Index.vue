<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    projetos: Object,
});

</script>

<template>

    <Head title="Projetos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projetos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end">
                        <Link :href="route('projetos.create')">Adicionar Novo
                        </Link>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Título</th>
                                    <th scope="col" class="px-6 py-3">Data de Início</th>
                                    <th scope="col" class="px-6 py-3">Data de Término</th>
                                    <th scope="col" class="px-6 py-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="projeto in projetos" :key="projeto.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ projeto.titulo }}</td>
                                    <td class="px-6 py-4">{{ projeto.data_inicio }}</td>
                                    <td class="px-6 py-4">{{ projeto.data_termino }}</td>
                                    <td class="px-6 py-4">Editar</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
