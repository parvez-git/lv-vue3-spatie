<template>
    <button 
        type="submit"
        :class="{'text-sm uppercase w-full block': fullwidth}"
        class="text-sm px-4 py-2.5 text-center text-white font-semibold bg-purple-600 hover:bg-primary transition rounded-xl border border-transparent">
        <slot></slot>
    </button>
</template>

<script>
import { computed } from 'vue'
export default {
    props: {
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