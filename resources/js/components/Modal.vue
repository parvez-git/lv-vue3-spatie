<template>
    <div class="bg-theme-code2 bg-opacity-60 fixed inset-0 z-40">
        <div class="absolute inset-0 m-auto h-64 w-96 bg-theme-bg rounded-lg text-center shadow-2xl px-8 py-12">
            <icon-close @click="closeModal"></icon-close>
            <h3 class="text-xl" v-html="title"></h3>
            <slot></slot>
            <button-primary @click="confirmModal" :wfull="true" class="mt-12">confirm</button-primary>
        </div>
    </div>
</template>

<script>
import IconClose from '../components/IconClose.vue';
import ButtonPrimary from '../components/ButtonPrimary.vue';
export default {
    name: 'Modal',
    emits: ['close','confirm'],
    components: { 
        IconClose, 
        ButtonPrimary 
    },
    props: {
        id: {
            type: Number,
            required: true
        },
        title: {
            type: String,
            default: 'Are you sure?',
        },
    },
    setup(props, context) 
    {
        function closeModal() {
            context.emit("close");
        }
        function confirmModal() {
            context.emit("confirm", props.id);
        }
        return { 
            closeModal, 
            confirmModal
        }
    }
}
</script>
