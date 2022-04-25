<template>
    <div class="relative">
        <input 
            :type="type" 
            :placeholder="placeholder" 
            @input='$emit("update:modelValue", $event.target.value)'
            class="w-full pr-2 pl-10 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1"
        >
        <div class="absolute top-3 left-2 text-theme-text border-r border-gray-300 pr-2">
            <slot></slot>
        </div>
    </div>
</template>

<script>
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
        }
    }
}
</script>