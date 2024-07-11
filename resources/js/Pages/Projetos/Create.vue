<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Membros from './Membros.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const showModal = ref(false);

const form = useForm({
    titulo: null,
    data_inicio: null,
    data_termino: null,
});

const formMembro = useForm({
    docente: null,
    carga_horaria_semanal: null,
    plano_trabalho: null
});

const membros = ref();

</script>

<template>

    <Head title="Criar Projeto" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Criar Projeto</h2>
        </template>

        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form class="w-full">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Título do Projeto
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-password" type="text" placeholder="Título do Projeto"
                                    v-model="form.titulo">
                                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Data de Início
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="date" placeholder="" v-model="form.data_inicio">
                                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Data de Término
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="date" placeholder="" v-model="form.data_termino">
                            </div>
                        </div>

                        <!-- Adicionar Membros aqui-->
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <button type="button" class="bg-orange-500 rounded-lg text-white p-2"
                                @click="showModal = true">Adicionar
                                Membro</button>

                            <Membros :show="showModal" @close="showModal = false" :membro="formMembro" />

                        </div>

                        <div class="w-full mx-auto">
                            <div class="flex justify-between">
                                <div>
                                    <h3>Lista de membros</h3>
                                </div>

                                <div class="">
                                    <button type="button" @click="showModal = true">Add Membro</button>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="bg-blue-500 rounded-lg text-white p-2">Cadastrar
                            Projeto</button>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
