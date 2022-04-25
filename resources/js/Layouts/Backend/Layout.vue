<template>
    <div class="flex min-h-screen w-full bg-theme-bg2 font-poppins font-base overflow-hidden">

        <!-- side menu -->
        <aside :class="{ '-translate-x-full': isActive }" class="w-64 z-40 bg-white fixed top-0 left-0 bottom-0 h-screen p-6 shadow-sm transform md:translate-x-0 transition duration-200 ease-in-out">
            <!-- logo -->
            <div class="flex items-center justify-between">
                <inertia-link :href="$route('dashboard')">
                    <Logo/>
                </inertia-link>

                <!-- toggle button -->
                <HideSidebar @click="toggleSidebar"/>
            </div>
            <Aside/>
        </aside>

        <!-- main-area -->
        <div class="flex-grow w-full md:ml-64 sm:relative">

            <!-- toggle button -->
            <ShowSidebar @click="toggleSidebar"/>

            <!-- top menu -->
            <Header/>

            <!-- content area -->
            <main class="w-full p-10">
                <slot></slot>
            </main>
            
        </div>

        <!-- flash message -->
        <Toast/>

    </div>
</template>

<script>
import { ref } from 'vue'
import Aside from './Aside.vue'
import Header from './Header.vue'
import HideSidebar from './HideSidebar.vue'
import ShowSidebar from './ShowSidebar.vue'
import Logo from '../../components/Logo.vue'
import Toast from '../../components/Toast.vue'

export default {
    components: {
        Logo,
        Aside,
        Header,
        HideSidebar,
        ShowSidebar,
        Toast
    },
    setup() {
        const isActive = ref(true)

        function toggleSidebar() {
            isActive.value = !isActive.value 
        }
        return { isActive, toggleSidebar }
    },
}
</script>
