<script setup>
import { useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false
    },
    membro: {
        type: Object,
        required: true
    }
});

const store = () => {

};

const emit = defineEmits(['close', 'updated']);

</script>

<template>
    <Modal :show="show" max-width="xl" @close="emit('close')">
        {{ membro }}

        <form class="relative bg-white rounded-lg shadow" @submit.prevent="store">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Add Membro
                </h3>
                <button @click.prevent="emit('close')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editUserModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-12 sm:col-span-12">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Nome do
                            Docente</label>
                        <input type="text" name="" id="" v-model="membro.nome">

                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Carga horária
                            Semanal</label>
                        <input type="text" name="" id="" v-model="membro.carga_horaria_semanal">

                    </div>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="text-right p-6 space-x-2 border-t rounded-b">
                <button @click.prevent="emit('close')" type="button"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">Cancel</button>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
            </div>
        </form>
    </Modal>
</template>
