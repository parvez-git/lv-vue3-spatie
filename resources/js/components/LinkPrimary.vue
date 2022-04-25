<template>
    <inertia-link :href="href" 
        :class="{'text-sm uppercase w-full block': fullwidth}"
        class="text-xs text-center text-white font-semibold bg-purple-600 hover:bg-primary transition px-4 py-2 rounded-xl border border-transparent">
        <slot></slot>
    </inertia-link>
</template>

<script>
import { computed } from 'vue'
export default {
    props: {
        href: {
            type: String,
            default: '/'
        },
        wfull: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {

        const fullwidth = computed( () => props.wfull)

        return { fullwidth }
    }
}
</script>