<template>
    <label 
        :for="fieldname" 
        class="block mb-2 text-theme-text text-sm uppercase font-medium">
        <slot></slot>
    </label>
</template>

<script>
export default {
    props: {
        fieldname: {
            type: String,
            default: 'fieldname'
        }
    }
}
</script>