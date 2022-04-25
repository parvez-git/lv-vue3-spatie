<template>
    <div class="flex items-center justify-between mb-8">
        <!-- search bar -->
        <search-bar v-model="form.search" @searchitem="reset"></search-bar>

        <!-- right button -->
        <button-create :href="$route('authorization.users.create')">create</button-create>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <div class="block overflow-x-auto">
            <table v-if="users.data.length" class="min-w-full text-theme-color">
                <thead class="bg-primary">
                    <tr>
                        <th class="pl-6 pr-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider border-l border-primary">SL.</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Name</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Role</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Permission</th>
                        <th class="pl-2 pr-6 py-3 text-right text-xs font-medium text-gray-100 uppercase tracking-wider border-r border-primary">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-theme-bg divide-y divide-gray-200 border-b border-gray-200">
                    <tr v-for="(user, index) in users.data" :key="index">
                        <td class="pl-6 pr-2 py-3 whitespace-nowrap border-l border-gray-200">
                            <span>{{ user.id }}.</span>
                        </td>
                        <td class="px-2 py-3 whitespace-nowrap">
                            <div class="text-sm font-medium">
                               {{ user.name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ user.email }}
                            </div>
                        </td>
                        <td class="px-2 py-3 space-x-1">
                            <span v-for="role in user.roles" :key="role.id" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                               {{ role.name }}
                            </span>
                        </td>
                        <td class="px-2 py-3 space-x-1">
                            <span v-for="permission in user.permissions" :key="permission.id" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                               {{ permission.name }}
                            </span>
                        </td>
                        <td class="pl-2 pr-6 py-3 whitespace-nowrap border-r border-gray-200">
                            <div class="flex items-center justify-end space-x-2">
                                <icon-edit :href="$route('authorization.users.edit', { user: user.id })"></icon-edit>
                                <icon-delete @click="openModal({id:user.id, name:user.name})"></icon-delete>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-else>
                <p class="text-center">Oops! No user found</p>
            </div>
        </div>
        <!-- pagination -->
        <div v-if="users.total > users.per_page" class="my-10">
            <link-pagination :links="users.links"></link-pagination>
        </div>

        <!-- modal -->
        <modal v-if="modalVisible" 
            :id="modalID"
            :title="modalTitle" 
            @close="closeModal" 
            @confirm="deleteData"
        ></modal>
    </div>
</template>

<script>
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'
import { openDialogBox } from '../../../../composables/openDialogBox'
import LayoutVue from '../../../../Layouts/Backend/Layout.vue'
import IconEdit from '../../../../components/IconEdit.vue'
import IconDelete from '../../../../components/IconDelete.vue'
import SearchBar from '../../../../components/SearchBar.vue'
import LinkPagination from '../../../../components/Pagination.vue'
import ButtonCreate from '../../../../components/Button.vue'
import Modal from '../../../../components/Modal.vue'

export default {
    components: { 
        IconEdit,
        IconDelete,
        LinkPagination,
        SearchBar,
        ButtonCreate,
        Modal,
        openDialogBox
    },
    layout: LayoutVue,
    props: {
        users: Object,
    },
    setup(props) {

        let { modalVisible, modalID, modalTitle, openModal, closeModal } = openDialogBox();

        const form = useForm({
            search: null
        })

        function reset() {
            form.search = null
        }

        function deleteData(id) {
            Inertia.delete(route('authorization.users.destroy', { user: id }), {
                onSuccess: () => closeModal()
            })
        }
        
        return { 
            modalVisible,
            modalID,
            modalTitle,
            openModal,
            closeModal,
            deleteData,
            form, 
            reset
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                this.$inertia.get(route('authorization.users.index'), pickBy(this.form), { 
                    preserveState: true,
                })
            }, 150),
        },
    },
}
</script>