<template>
    <teleport to="body">
        <transition
            enter-active-class="transition ease-out duration-300 transform "
            enter-from-class="opacity-0 translate-y-10 scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="ease-in duration-200"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 translate-y-10 translate-y-0 scale-95"
        >
            <div class="bg-theme-bg2 fixed inset-0 m-auto z-50 h-1/2 rounded-lg text-center overflow-hidden shadow-2xl p-8 w-1/4"
                role="dialog"
                ref="modal"
                aria-modal="true"
                v-show="showModal"
                aria-labelledby="modal-headline"
            >
                <div @click="closeModal" class="absolute top-4 right-4 cursor-pointer text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl">{{ title }}</h3>
                <slot></slot>
            </div>
        </transition>
    </teleport>
</template>

<script>
import { ref, watch } from 'vue';

export default {
    name: 'ModalDialog',
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            default: 'Are you sure?',
        },
    },
    setup(props) {
        const showModal = ref(false)

        function closeModal() {
            showModal.value = !showModal.value;
        }

        watch( () => props.show, (show) => {
                showModal.value = show;
                console.log(show)
            },
        )

        return {
            showModal,
            closeModal
        }
    }
}
</script>