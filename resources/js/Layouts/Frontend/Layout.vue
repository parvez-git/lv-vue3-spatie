<template>
    <header class="flex items-center justify-between bg-white px-6 shadow">
        <div class="flex items-center justify-between">
            <!-- logo -->
            <div class="flex items-center justify-between mr-4">
                <inertia-link href="/">
                    <Logo/>
                </inertia-link>
            </div>
            <!-- menu items -->
            <Nav/>
        </div>
        <!-- login and registration -->
        <div class="flex items-center space-x-4">
            <a href="/login" class="text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-4 py-2 rounded-xl border">Login</a>
            <a href="/register" class="text-xs text-white font-semibold bg-purple-600 hover:bg-primary transition px-4 py-2 rounded-xl border border-transparent">Register</a>
        </div>
    </header>

    <!-- main area -->
    <main class="bg-theme-bg block px-6 py-10">
        <slot></slot>
    </main>

</template>

<script>
import Nav from './Nav.vue'
import Logo from '../../components/Logo.vue'

export default {
    components: { 
        Nav,
        Logo,
    },
    setup() {
        
    },
}
</script>