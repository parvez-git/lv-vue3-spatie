<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Edit Category</h2>
        <link-primary :href="$route('dashboard.categories.index')">categories</link-primary>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <form @submit.prevent="submit">
            <div  class="flex space-x-8">
                <div class="w-2/3">
                    <div class="mb-4">
                        <input-label>Categroy Name:</input-label>
                        <input-field v-model="form.name" placeholder="category" :wfull="true"></input-field>
                        <input-error :msg="form.errors.name"></input-error>
                    </div>
                </div>
                <div class="w-1/3">
                    <input-label>Image:</input-label>
                    <div class="my-2 border p-2">
                        <img v-if="category.image"
                            :src="imageUrl"
                            class="w-48 h-48 object-cover mb-2">
                        <label class="flex flex-col items-center px-4 py-2 bg-theme-bg2 rounded-md shadow-sm tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                            <span class="text-xs font-bold">Select a Image</span>
                            <input type="file"
                                accept="image/*"
                                @change="handleImageSelected"
                                class="hidden">
                        </label>
                        <input-error :msg="form.errors.image"></input-error>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button-primary :disabled="form.processing">Update</button-primary>
            </div>
        </form>

    </div>
</template>

<script>
import { onMounted } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { useImageUpload } from "../../../../composables/useImageUpload"
import LayoutVue from '../../../../Layouts/Backend/Layout.vue'
import InputError from '../../../../components/InputError.vue'
import InputLabel from '../../../../components/InputLabel.vue'
import InputField from '../../../../components/InputField.vue'
import ButtonPrimary from '../../../../components/ButtonPrimary.vue'
import LinkPrimary from '../../../../components/LinkPrimary.vue'
import CheckboxGroup from '../../../../components/CheckboxGroup.vue'

export default {
    components: { 
        InputField,
        InputError,
        InputLabel,
        ButtonPrimary,
        LinkPrimary,
        CheckboxGroup,
    },
    layout: LayoutVue,
    props: [
        'category'
    ],
    setup(props) {
        let { imageFile, imageUrl, handleImageSelected } = useImageUpload();

        const form = useForm({
            name: props.category.name,
            image: imageFile
        })

        onMounted(() => {
            imageUrl.value = '/storage/images/categories/' + props.category.image
        })

        function submit() {
            form.post(route('dashboard.categories.update', { 
                category: props.category.id,
                _method: 'put'
            }))
        }

        return { imageUrl, handleImageSelected, form, submit }
    },
}
</script>