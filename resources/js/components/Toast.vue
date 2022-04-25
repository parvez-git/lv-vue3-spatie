<template>
    <transition name="slide-fade">
        <div v-if="$page.props.toast.success && visible" class="absolute flex max-w-xs w-full top-16 right-2 bg-white px-4 py-3 rounded-xl shadow">
            <div class="mr-2 text-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex-1">{{ $page.props.toast.success }}</div>
            <div class="ml-2">
                <icon-close @click="visible = false"></icon-close>
            </div>
        </div>
    </transition>
</template>

<script>
import { ref } from 'vue'
import IconClose from './IconClose.vue'

export default {
  components: { 
        IconClose 
    },
    setup() {
        const visible = ref(true)
        const timeout = ref(null)

        return { visible, timeout }
    },
    watch: {
        '$page.props.toast': {
            handler() {
                this.visible = true

                if(this.timeout) {
                    clearTimeout(this.timeout)
                }
                this.timeout = setTimeout( () => this.visible = false, 1000)
            },
            deep: true,
        },
    },
}
</script>

<style scoped>
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(150px);
        opacity: 0;
    }
</style>