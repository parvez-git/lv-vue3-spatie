<template>
    <div class="relative">
        <input 
            type="text" 
            placeholder="search…" 
            :value='modelValue'
            @input='$emit("update:modelValue", $event.target.value)'
            autocomplete="off"
            class="pl-10 pr-6 py-2.5 border-transparent ring-1 ring-theme-bg2 rounded-xl shadow-sm focus:outline-none"
        >
        <!-- search icon -->
        <div class="absolute top-0 left-0 py-3 px-3 text-theme-text">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <!-- close icon -->
        <div 
            v-if="modelValue" 
            @click="reset" 
            class="absolute top-0 right-0 py-3.5 px-3 cursor-pointer text-danger">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    emits: [
        'update:modelValue',
        'searchitem'
    ],
    props: {
        modelValue: String,
    },
    setup(props, context) {
        function reset() {
            context.emit("searchitem");
        }
        return { reset }
    }
}
</script>