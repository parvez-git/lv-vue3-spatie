<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Category List</h2>
        <button-create :href="$route('dashboard.categories.create')">create</button-create>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <div class="block overflow-x-auto">
            <table class="min-w-full text-theme-color">
                <thead class="bg-primary">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider border-l border-primary">SL.</th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-100 uppercase tracking-wider border-r border-primary">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-theme-bg divide-y divide-gray-200 border-b border-gray-200">
                    <tr v-for="(category, index) in categories" :key="index">
                        <td class="px-6 py-3 whitespace-nowrap border-l border-gray-200">
                            <span>{{ ++index }}.</span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img v-if="category.image" class="h-10 w-10 rounded-full" 
                                    :src="'/storage/images/categories/' + category.image" 
                                    :alt="category.name">
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ category.name }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap border-r border-gray-200">
                            <div class="flex items-center justify-end space-x-2">
                                <icon-edit :href="$route('dashboard.categories.edit', { category: category.id })"></icon-edit>
                                <icon-delete @click="openModal({id:category.id, name:category.name})"></icon-delete>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <!-- modal -->
    <modal v-if="modalVisible" 
        :id="modalID"
        :title="modalTitle" 
        @close="closeModal" 
        @confirm="deleteData"
    ></modal>

</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import LayoutVue from '../../../../Layouts/Backend/Layout.vue'
import IconEdit from '../../../../components/IconEdit.vue'
import IconDelete from '../../../../components/IconDelete.vue'
import ButtonCreate from '../../../../components/Button.vue'
import Modal from '../../../../components/Modal.vue'

import { openDialogBox } from '../../../../composables/openDialogBox'

export default {
    components: { 
        IconEdit,
        IconDelete,
        ButtonCreate,
        Modal,
        openDialogBox,
    },
    layout: LayoutVue,
    props: ['categories'],
    setup() {
        let { modalVisible, modalID, modalTitle, openModal, closeModal } = openDialogBox();
        
        function deleteData(id) {
            Inertia.delete(route('dashboard.categories.destroy', { category: id }), {
                onSuccess: () => closeModal(),
            })
        }

        return {
            modalVisible,
            modalID,
            modalTitle,
            openModal,
            closeModal,
            deleteData
        }
    },
}
</script>