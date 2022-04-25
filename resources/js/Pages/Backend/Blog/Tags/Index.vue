<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Tag List</h2>
        <button-create :href="$route('dashboard.tags.create')">create</button-create>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <div class="block overflow-x-auto">
            <table class="min-w-full text-theme-color">
                <thead class="bg-primary">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider border-l border-primary">SL.</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-100 uppercase tracking-wider border-r border-primary">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-theme-bg divide-y divide-gray-200 border-b border-gray-200">
                    <tr v-for="(tag, index) in tags" :key="index">
                        <td class="px-6 py-3 whitespace-nowrap border-l border-gray-200">
                            <span>{{ ++index }}.</span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ tag.name }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap italic text-sm">
                            {{ tag.slug }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap border-r border-gray-200">
                            <div class="flex items-center justify-end space-x-2">
                                <icon-edit :href="$route('dashboard.tags.edit', { tag: tag.id })"></icon-edit>
                                <icon-delete @click="openModal({id:tag.id, name:tag.name})"></icon-delete>
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
        @close="modalVisible = false" 
        @confirm="deleteData"
    ></modal>

</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia'
import LayoutVue from '../../../../Layouts/Backend/Layout.vue'
import IconEdit from '../../../../components/IconEdit.vue'
import IconDelete from '../../../../components/IconDelete.vue'
import ButtonCreate from '../../../../components/Button.vue'
import Modal from '../../../../components/Modal.vue'

export default {
    components: { 
        IconEdit,
        IconDelete,
        ButtonCreate,
        Modal,
    },
    layout: LayoutVue,
    props: ['tags'],
    setup() {
        const modalVisible = ref(false);
        const modalID = ref(null);
        const modalTitle = ref('');

        function openModal(tag) {
            modalVisible.value = true
            modalID.value = tag.id
            modalTitle.value = 'Are you sure? You want to delete tag: <br/><span class="px-2 py-1 text-base text-dark font-semibold bg-red-200 rounded-lg">' + tag.name + '</span> ?'
        }

        function deleteData(id) {
            Inertia.delete(route('dashboard.tags.destroy', { tag: id }), {
                onSuccess: () => console.log('onSuccess'),
            })
            modalVisible.value = false
            modalID.value = null
            modalTitle.value = ''
        }

        return {
            modalVisible,
            modalID,
            modalTitle,
            openModal,
            deleteData
        }
    },
}
</script>