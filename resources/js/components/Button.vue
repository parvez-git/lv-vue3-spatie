<template>
    <inertia-link :href="href" 
        class="text-xs text-white font-semibold bg-success hover:bg-green-600 transition px-4 py-2 rounded-xl border border-transparent">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: {
        href: {
            type: String,
            default: '/'
        }
    },
    setup(props) {

    }
}
</script>