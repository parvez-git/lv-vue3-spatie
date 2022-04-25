<template>
    <div class="relative">
        <input 
            :type="type" 
            :placeholder="placeholder" 
            @input='$emit("update:modelValue", $event.target.value)'
            class="w-full pr-2 pl-10 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1"
        >
        <div class="absolute top-3 left-2 text-theme-text border-r border-gray-300 pr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
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
            default: 'email'
        },
        placeholder: {
            type: String,
            default: 'email'
        }
    }
}
</script>