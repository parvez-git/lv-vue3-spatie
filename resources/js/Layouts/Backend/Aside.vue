<template>
    <nav>
        <!-- aside nav top-part -->
        <ul class="my-10 text-sm font-bold"> 
            <li class="mb-4 pl-3 border-l-4 border-primary">
                <inertia-link :href="$route('dashboard')" class="flex items-center space-x-2 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="">Dashboard</span>
                </inertia-link>
            </li>
            <li class="mb-4 pl-3 border-l-4 border-transparent">
                <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                    </svg>
                    <span class="">Contact</span>
                </a>
            </li>
            <!-- blog -->
            <li class="mb-4 pl-3 border-l-4 border-transparent" @click="showSubMenu = !showSubMenu">
                <button class="flex items-center w-full font-bold text-theme-text hover:text-dark transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <span class="ml-2">Blog</span>
                    <span class="ml-auto transition-all duration-500 ease-in-out transform" :class="{ 'rotate-180': showSubMenu }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <ul class="ml-2 pl-4 border-l border-gray-300 overflow-y-hidden transition-height duration-500 ease-in-out h-0" :class="{'h-24': showSubMenu}">
                    <li class="mb-1.5 pt-3">
                        <inertia-link 
                            :href="$route('dashboard.posts.index')" 
                            class="text-theme-text hover:text-dark transition">
                            <span>Posts</span>
                        </inertia-link>
                    </li>
                    <li class="mb-1.5">
                        <inertia-link 
                            :href="$route('dashboard.categories.index')" 
                            class="text-theme-text hover:text-dark transition">
                            <span>Categories</span>
                        </inertia-link>
                    </li>
                    <li class="mb-1.5">
                        <inertia-link 
                            :href="$route('dashboard.tags.index')" 
                            class="text-theme-text hover:text-dark transition">
                            <span>Tags</span>
                        </inertia-link>
                    </li>
                </ul>
            </li>

            <!-- chat -->
            <li class="mb-4 pl-3 border-l-4 border-transparent">
                <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="">Chat</span>
                </a>
            </li>
        </ul>

        <!-- settings -->
        <div class="border-t border-theme-bg2">
            <h6 class="text-sm text-theme-text pt-3">Manage Role &#38; Permissions</h6>
        </div>
        <ul class="my-6 text-sm font-bold">
            <li class="mb-4 pl-3 border-l-4 border-transparent" @click="showSettingMenu = !showSettingMenu">
                <button class="flex items-center w-full font-bold text-theme-text hover:text-dark transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    <span class="ml-2">Users &#38; Roles</span>
                    <span class="ml-auto transition-all duration-500 ease-in-out transform" :class="{ 'rotate-180': showSettingMenu }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <ul class="ml-2 pl-4 border-l border-gray-300 overflow-y-hidden transition-height duration-500 ease-in-out h-0" :class="{'h-24': showSettingMenu}">
                    <li class="mb-1.5 pt-3">
                        <inertia-link 
                            :href="$route('authorization.users.index')" 
                            class="text-theme-text hover:text-dark transition">
                            <span>Users List</span>
                        </inertia-link>
                    </li>
                    <li class="mb-1.5">
                        <inertia-link 
                            :href="$route('authorization.roles.index')" 
                            class="text-theme-text hover:text-dark transition">
                            <span>Roles List</span>
                        </inertia-link>
                    </li>
                    <li class="mb-1.5">
                        <inertia-link 
                            :href="$route('authorization.permissions.index')" 
                            class="text-theme-text hover:text-dark transition">
                            <span>Permissions</span>
                        </inertia-link>
                    </li>
                </ul>
            </li>
            <li class="mb-4 pl-3 border-l-4 border-transparent">
                <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="">Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
import { ref } from 'vue'
import Button from '../../components/Button.vue';
export default {
    components: { Button },
    setup() {
        const showSettingMenu = ref(false)
        const showSubMenu = ref(false);

        return { showSettingMenu, showSubMenu }
    }
}
</script>