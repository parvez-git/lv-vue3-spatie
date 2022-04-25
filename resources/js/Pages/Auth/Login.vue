<template>
    <div class="mx-auto max-w-sm bg-theme-layout p-10 rounded shadow-sm">
        
        <h2 class="text-xl font-semibold uppercase text-center text-theme-color leading-10">Sign In</h2> 
        <span class="w-8 mx-auto block h-px bg-primary mb-6"></span>

        <form @submit.prevent="submit">
            <div class="my-4">
                <input-icon-email v-model="form.email"></input-icon-email>
                <input-error :msg="form.errors.email"></input-error>
            </div>
            <div class="my-4">
                <input-icon-password v-model="form.password"></input-icon-password>
                <input-error :msg="form.errors.password"></input-error>
            </div>
            <div class="my-8">
                <button-primary :wfull="true" :disabled="form.processing">Login</button-primary>
            </div>
        </form>

    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import LayoutVue from '../../Layouts/Frontend/Layout.vue'
import InputError from '../../components/InputError.vue'
import InputIconEmail from '../../components/InputIconEmail.vue'
import InputIconPassword from '../../components/InputIconPassword.vue'
import ButtonPrimary from '../../components/ButtonPrimary.vue'

export default {
    components: { 
        InputIconEmail,
        InputIconPassword,
        InputError,
        ButtonPrimary
    },
    layout: LayoutVue,
    setup() {
        const form = useForm({
            // email: null,
            // password: null,
            email: 'p4alam@gmail.com',
            password: '12345678',
        })

        function submit() {
            form.post(route('login'))
        }

        return { form, submit }
    },
}
</script>