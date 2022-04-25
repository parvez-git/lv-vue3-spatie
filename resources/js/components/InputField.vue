<template>
    <input 
        :type='type'
        :value='modelValue'
        :placeholder='placeholder'
        @input='$emit("update:modelValue", $event.target.value)'
        :class="{'w-full': fullwidth}"
        class="px-3 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1"
    />
</template>

<script>
import { computed } from 'vue'
export default {
    emits: ['update:modelValue'],
    props: {
        modelValue: String,
        type: {
            type: String,
            default: 'text'
        },
        placeholder: {
            type: String,
            default: 'name'
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