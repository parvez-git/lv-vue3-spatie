<template>
    <header class="flex items-center justify-between bg-white px-6 shadow">
        <!-- left menu -->
        <ul class="text-sm font-bold flex items-center space-x-4 pl-6 md:pl-0">
            <li class="p-3 border-b-2 border-primary">
                <a href="/" class="flex items-center space-x-2 text-dark transition">
                    Home
                </a>
            </li>
            <li class="p-3 border-b-2 border-transparent">
                <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                    Docs
                </a>
            </li>
        </ul>
        <!-- right menu -->
        <div class="flex items-center space-x-4">
            <!-- icon notification -->
            <div class="relative">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 cursor-pointer text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-2 py-2 rounded-xl border focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <div v-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

                <transition
                    enter-active-class="transition duration-150 ease-out transform"
                    enter-from-class="scale-95 opacity-0"
                    enter-to-class="scale-100 opacity-100"
                    leave-active-class="transition duration-150 ease-in transform"
                    leave-from-class="scale-100 opacity-100"
                    leave-to-class="scale-95 opacity-0"
                >
                    <div v-show="dropdownOpen" class="absolute right-0 top-11 z-20 w-48 px-4 py-3 bg-theme-layout border-l border-r border-b shadow rounded-b divide-y divide-gray-100 divide-double">
                        <inertia-link href="/profile" class="block py-1 text-theme-text hover:text-dark transition">
                            <span class="font-semibold text-xs">Profile</span>
                        </inertia-link>
                        <inertia-link href="/profile" class="block py-1 text-theme-text hover:text-dark transition">
                            <span class="font-semibold text-xs">Profile</span>
                        </inertia-link>
                        <inertia-link href="/profile" class="block py-1 text-theme-text hover:text-dark transition">
                            <span class="font-semibold text-xs">Profile</span>
                        </inertia-link>
                        <inertia-link href="/profile" class="block py-1 text-theme-text hover:text-dark transition">
                            <span class="font-semibold text-xs">Profile</span>
                        </inertia-link>
                    </div>
                </transition>
            </div>
            <!-- profile dropdown -->
            <div class="relative">
                <button @click="dropdownProfileOpen = !dropdownProfileOpen" class="relative z-10 cursor-pointer text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-2 py-2 rounded-xl border focus:outline-none">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2">Super Admin</span>
                        <span class="ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </button>

                <div v-show="dropdownProfileOpen" @click="dropdownProfileOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

                <transition
                    enter-active-class="transition duration-150 ease-out transform"
                    enter-from-class="scale-95 opacity-0"
                    enter-to-class="scale-100 opacity-100"
                    leave-active-class="transition duration-150 ease-in transform"
                    leave-from-class="scale-100 opacity-100"
                    leave-to-class="scale-95 opacity-0"
                >
                    <div v-show="dropdownProfileOpen" class="absolute right-0 top-11 z-20 px-4 text-xs w-36 bg-theme-layout border-l border-r border-b shadow rounded-b divide-y divide-gray-100 divide-double">
                        <span class="block py-2 font-normal text-gray-300">Manage Profile</span>
                        <inertia-link href="/profile" class="py-2 flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="font-semibold">Profile</span>
                        </inertia-link>
                        <inertia-link :href="$route('logout')" method="post" as="button" class="py-2 flex items-center space-x-2 pb-3 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="font-semibold">Logout</span>
                        </inertia-link>
                    </div>
                </transition>
            </div>
        </div>
    </header>
</template>

<script>
import { ref } from 'vue'

export default {
    setup() {
        const dropdownOpen = ref(false);
        const dropdownProfileOpen = ref(false);

        return { dropdownOpen, dropdownProfileOpen }
    }
}
</script>