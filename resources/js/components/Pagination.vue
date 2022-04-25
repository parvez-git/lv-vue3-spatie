<template>
    <div class="flex justify-center items-center px-3 cursor-pointer leading-5 transition duration-150 ease-in">
        <inertia-link v-for="(link, index) in links" 
            :key="index" 
            :href="link.url === null ? '#' : link.url"  
            :class="['flex justify-center items-center px-2 cursor-pointer text-theme-color leading-5 transition duration-150 ease-in', 
            link.active ? 'font-semibold' : '',
            link.url === null ? 'cursor-not-allowed opacity-50' : '']"
            v-html="link.label">
        </inertia-link>
    </div>
</template>

<script>
export default {
    props: ['links']
}
</script>