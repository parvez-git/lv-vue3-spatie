<template>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl">Create Role</h2>
        <link-primary :href="$route('authorization.roles.index')">roles list</link-primary>
    </div>
    <div class="mx-auto bg-theme-layout p-10 rounded shadow-sm">

        <form @submit.prevent="submit">
            <div class="mb-8">
                <input-label>Role Name:</input-label>
                <input-field v-model="form.name"></input-field>
                <input-error :msg="form.errors.name"></input-error>
            </div>
            <div class="my-4">
                <input-label>Select Permissions:</input-label>
                <div class="inline-flex flex-col space-y-2">
                    <checkbox-group v-for="(permission, index) in permissions" :key="index"
                        v-model:names="form.assaignpermissions" 
                        :fieldId="permission.name + permission.id" 
                        :value="permission.id" 
                        :label="permission.name" 
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
    props: ['permissions'],
    setup() {
        const names = ref([]);

        const form = useForm({
            name: null,
            assaignpermissions: names.value
        })

        function submit() {
            form.post(route('authorization.roles.store'))
        }

        return { names, form, submit }
    },
}
</script>