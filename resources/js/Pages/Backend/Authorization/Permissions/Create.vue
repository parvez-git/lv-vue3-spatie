<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Create Permission</h2>
        <link-primary :href="$route('authorization.permissions.index')">permissions</link-primary>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <form @submit.prevent="submit">
            <div class="mb-8">
                <input-label>Permission Name:</input-label>
                <input-field v-model="form.name"></input-field>
                <input-error :msg="form.errors.name"></input-error>
            </div>
            <div class="my-4">
                <input-label>Select Role:</input-label>
                <div class="inline-flex flex-col space-y-2">
                    <checkbox-group v-for="(role, index) in roles" :key="index"
                        v-model:names="form.assaignroles" 
                        :fieldId="role.name + role.id" 
                        :value="role.id" 
                        :label="role.name" 
                    ></checkbox-group>
                </div>
            </div>
            <div class="mt-6">
                <button-primary :disabled="form.processing">Create</button-primary>
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
    props: ['roles'],
    setup() {
        const names = ref([]);

        const form = useForm({
            name: null,
            assaignroles: names.value
        })

        function submit() {
            form.post(route('authorization.permissions.store'))
        }

        return { names, form, submit }
    },
}
</script>