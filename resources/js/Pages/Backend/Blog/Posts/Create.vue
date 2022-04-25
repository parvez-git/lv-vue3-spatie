<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Create Post</h2>
        <link-primary :href="$route('dashboard.posts.index')">posts</link-primary>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <form @submit.prevent="submit">
            <div  class="flex space-x-8">
                <div class="w-2/3">
                    <div class="mb-4">
                        <input-label>Title:</input-label>
                        <input-field v-model="form.title" placeholder="title" :wfull="true"></input-field>
                        <input-error :msg="form.errors.title"></input-error>
                    </div>
                    <div class="my-4">
                        <input-label>Content:</input-label>
                        <quill-editor
                            v-model:value="form.body"
                            :options="state.editorOption"
                            class="h-60 block"
                        />
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="my-3 border p-2">
                        <img v-show="imageUrl"
                            :src="imageUrl"
                            class="w-full h-48 object-cover mb-2">
                        <label class="flex flex-col items-center px-4 py-2 bg-theme-bg2 rounded-md shadow-sm tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                            <span class="text-xs font-bold">Select a Image</span>
                            <input type="file"
                                accept="image/*"
                                @change="handleImageSelected"
                                class="hidden">
                        </label>
                    </div>
                    <div class="my-8">
                        <div class="mb-8">
                            <input-label>Select Categories:</input-label>
                            <div class="inline-flex flex-col w-full drop-shadow-sm rounded space-y-2 h-60 p-3 bg-theme-bg overflow-y-scroll">
                                <checkbox-group v-for="(category, index) in categories" :key="index"
                                    v-model:names="form.categories" 
                                    :fieldId="category.name + category.id" 
                                    :value="category.id" 
                                    :label="category.name" 
                                ></checkbox-group>
                            </div>
                        </div>
                        <div class="mb-8">
                            <input-label>Select Tags:</input-label>
                            <div class="inline-flex w-full flex-col rounded space-y-2 h-60 p-3 bg-theme-bg overflow-y-scroll">
                                <checkbox-group v-for="(tag, index) in tags" :key="index"
                                    v-model:names="form.tags" 
                                    :fieldId="tag.name + tag.id" 
                                    :value="tag.id" 
                                    :label="tag.name" 
                                ></checkbox-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button-primary :disabled="form.processing">Create</button-primary>
            </div>
        </form>

    </div>
</template>

<script>
import { reactive } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import LayoutVue from '../../../../Layouts/Backend/Layout.vue'
import InputError from '../../../../components/InputError.vue'
import InputLabel from '../../../../components/InputLabel.vue'
import InputField from '../../../../components/InputField.vue'
import ButtonPrimary from '../../../../components/ButtonPrimary.vue'
import LinkPrimary from '../../../../components/LinkPrimary.vue'
import CheckboxGroup from '../../../../components/CheckboxGroup.vue'

import { useImageUpload } from "../../../../composables/useImageUpload";
import { quillEditor, Quill } from 'vue3-quill'

export default {
    components: { 
        InputField,
        InputError,
        InputLabel,
        ButtonPrimary,
        LinkPrimary,
        CheckboxGroup,
        quillEditor
    },
    layout: LayoutVue,
    props: [
        'categories',
        'tags'
    ],
    setup() {
        let { imageFile, imageUrl, handleImageSelected } = useImageUpload();

        // Quill rich text Editor Option
        const state = reactive({
        editorOption: {
            placeholder: 'Content goes here...',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ header: 1 }, { header: 2 }],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ script: 'sub' }, { script: 'super' }],
                    [{ header: [1, 2, 3, 4, 5, 6, false] }],
                    [{ color: [] }],
                    ['clean'],
                    ['link']
                ]
            },
        },
        })

        const form = useForm({
            title: null,
            body: null,
            published: true,
            categories: [],
            tags: [],
            image: imageFile
        })

        function submit() {
            form.post(route('dashboard.posts.store'))
        }

        return { 
            imageUrl,
            handleImageSelected,
            form, 
            submit,
            state,
        }
    },
}
</script>