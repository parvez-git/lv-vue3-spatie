<template>
    <div v-show="msg">
        <p class="text-xs text-red-600 mt-1">
            {{ msg }}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['msg']
    }
</script>