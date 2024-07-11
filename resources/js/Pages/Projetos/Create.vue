<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Membros from './Membros.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';

const showModal = ref(false);

const form = useForm({
    titulo: null,
    data_inicio: null,
    data_termino: null,
});

const membro = ref({
    id: null,
    nome: null,
    carga_horaria_semanal: null
});

const membros = reactive([]);

const adicionarMembro = (membro) => {

    if (membro.id) {
        membros[membro.id - 1] = { id: membro.id, nome: membro.nome, carga_horaria_semanal: membro.carga_horaria_semanal }
    } else {
        membros.push({ id: membros.length + 1, nome: membro.nome, carga_horaria_semanal: membro.carga_horaria_semanal });
    }
}

const editar = (m) => {
    showModal.value = true;
    membro.value = m;

}

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

                    <form class="w-full p-2">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-password">
                                    Título do Projeto
                                </label>
                                <input
                                    class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-password" type="text" placeholder="Título do Projeto"
                                    v-model="form.titulo">
                                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Data de Início
                                </label>
                                <input
                                    class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="date" placeholder="" v-model="form.data_inicio">

                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Data de Término
                                </label>
                                <input
                                    class="appearance-none block w-full border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="date" placeholder="" v-model="form.data_termino">
                            </div>
                        </div>

                        <!-- Adicionar Membros aqui-->

                        <div class="flex justify-end">
                            <div class="mb-6">
                                <button type="button" @click="showModal = true"><span
                                        class="bg-orange-500 rounded-lg text-white p-2">Adicionar
                                        Membro</span></button>
                            </div>
                        </div>

                        <Membros @adicionarMembro="adicionarMembro($event)" :show="showModal" @close="showModal = false"
                            :membro="membro" />

                        <div class="w-full mx-auto">
                            <div class="flex justify-between">
                                <table class="table-auto w-full">
                                    <thead class="bg-gray-200">
                                        <tr>
                                            <th class="text-left">
                                                ID
                                            </th>
                                            <th class="text-left">
                                                Nome
                                            </th>
                                            <th class="text-left">
                                                Carga Horária
                                            </th>
                                            <th class="text-left" colspan="2">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="m in membros">
                                            <td>{{ m.id }}</td>
                                            <td>{{ m.nome }}</td>
                                            <td>{{ m.carga_horaria_semanal }}</td>
                                            <td>
                                                <button type="button" @click="editar(m)">Editar</button>
                                            </td>
                                            <td>Excluir</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 rounded-lg text-white p-2 mt-6">Cadastrar
                            Projeto</button>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
