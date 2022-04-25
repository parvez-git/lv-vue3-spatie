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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
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
            default: 'password'
        },
        placeholder: {
            type: String,
            default: 'password'
        }
    }
}
</script>