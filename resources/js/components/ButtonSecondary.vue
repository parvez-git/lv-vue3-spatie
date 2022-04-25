<template>
    <a :href="href" 
        :class="{'text-sm uppercase w-full block': fullwidth}"
        class="text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-4 py-2 rounded-xl border">
        <slot></slot>
    </a>
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