<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Edit Tag</h2>
        <link-primary :href="$route('dashboard.tags.index')">tags</link-primary>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <form @submit.prevent="submit">
            <div class="mb-4">
                <input-label>Tag Name:</input-label>
                <input-field v-model="form.name" placeholder="tag"></input-field>
                <input-error :msg="form.errors.name"></input-error>
            </div>
            <div class="mt-6">
                <button-primary :disabled="form.processing">Update</button-primary>
            </div>
        </form>

    </div>
</template>

<script>
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
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
        'tag'
    ],
    setup(props) {
        const form = useForm({
            name: props.tag.name,
        })

        function submit() {
            form.put(route('dashboard.tags.update', { tag: props.tag.id }))
        }

        return { form, submit }
    },
}
</script>