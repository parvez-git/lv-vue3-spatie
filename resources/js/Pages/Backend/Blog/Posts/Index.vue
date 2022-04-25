<template>
    <div class="flex items-center justify-between mb-8">
        <!-- search bar -->
        <search-bar v-model="form.search" @searchitem="reset"></search-bar>
        <!-- right button -->
        <button-create :href="$route('dashboard.posts.create')">create</button-create>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <div class="block overflow-x-auto">
            <table v-if="posts.data.length" class="min-w-full text-theme-color">
                <thead class="bg-primary">
                    <tr>
                        <th class="pl-6 pr-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider border-l border-primary">SL.</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Name</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Image</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Categories</th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Tags</th>
                        <th class="pl-2 pr-6 py-3 text-right text-xs font-medium text-gray-100 uppercase tracking-wider border-r border-primary">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-theme-bg divide-y divide-gray-200 border-b border-gray-200">
                    <tr v-for="(post, index) in posts.data" :key="index">
                        <td class="pl-6 pr-2 py-3 whitespace-nowrap border-l border-gray-200">
                            <span>{{ ++index }}.</span>
                        </td>
                        <td class="px-2 py-3">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img v-show="post.image" class="h-10 w-10 rounded" 
                                    :src="'/storage/images/posts/' + post.image" 
                                    :alt="post.title">
                            </div>
                        </td>
                        <td class="px-2 py-3">
                            <div class="text-sm font-medium">
                               {{ post.title }}
                            </div>
                            <div class="text-xs text-gray-500">
                               <span class="italic">by - </span> {{ post.user.name }}
                            </div>
                        </td>
                        <td class="px-2 py-3 space-x-1">
                            <span v-for="category in post.categories" :key="category.id" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                               {{ category.name }}
                            </span>
                        </td>
                        <td class="px-2 py-3 space-x-1">
                            <span v-for="tag in post.tags" :key="tag.id" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                               {{ tag.name }}
                            </span>
                        </td>
                        <td class="pl-2 pr-6 py-3 whitespace-nowrap border-r border-gray-200">
                            <div class="flex items-center justify-end space-x-2">
                                <icon-edit :href="$route('dashboard.posts.edit', { post: post.id })"></icon-edit>
                                <icon-delete @click="openModal({id:post.id, name:post.title})"></icon-delete>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-else>
                <p class="text-center">Oops! No post found</p>
            </div>
        </div>
        <!-- pagination -->
        <div v-if="posts.total > posts.per_page" class="my-10">
            <link-pagination :links="posts.links"></link-pagination>
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
        posts: Object,
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
            Inertia.delete(route('dashboard.posts.destroy', { post: id }), {
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
                this.$inertia.get(route('dashboard.posts.index'), pickBy(this.form), { 
                    preserveState: true,
                })
            }, 150),
        },
    },
}
</script>