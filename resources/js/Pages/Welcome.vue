<template>
    <div class="flex min-h-screen w-full bg-theme-bg2 font-poppins font-base overflow-hidden">
        <!-- side menu -->
        <aside class="w-64 bg-white fixed top-0 left-0 bottom-0 h-screen p-6 shadow-sm">
            <!-- logo -->
            <div class="flex items-center justify-between">
                <div class="uppercase text-xl font-bold">DevCan Logo</div>
                <div class="text-dark font-bold cursor-pointer hover:text-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                </div>
            </div>
            <nav>
                <ul class="my-10 text-sm font-bold"> 
                    <li class="mb-4 pl-3 border-l-4 border-primary">
                        <a href="/" class="flex items-center space-x-2 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="">Home</span>
                        </a>
                    </li>
                    <li class="mb-4 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <span class="">About</span>
                        </a>
                    </li>
                    <li class="mb-4 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                            <span class="">Contact</span>
                        </a>
                    </li>
                    <li class="mb-4 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <span class="">Products</span>
                        </a>
                    </li>
                    <li class="mb-4 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                            <span class="">Pricing</span>
                        </a>
                    </li>
                    <li class="mb-4 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                            <span class="">Cart</span>
                        </a>
                    </li>
                </ul>
                <div class="border-t border-theme-bg2">
                    <h6 class="text-sm text-theme-text pt-3">Manage Role &#38; Permissions</h6>
                </div>
                <ul class="my-6 text-sm font-bold">
                    <li class="mb-0 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <span class="ml-2">User</span>
                            <span class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <ul class="ml-6 pl-4 border-l border-gray-300">
                            <li class="mb-1 pt-4"><a href="#" class="text-theme-text hover:text-dark transition">Products</a></li>
                            <li class="mb-1"><a href="#" class="text-theme-text hover:text-dark transition">Cart</a></li>
                            <li class="mb-1"><a href="#" class="text-theme-text hover:text-dark transition">Payment Information</a></li>
                        </ul>
                    </li>
                    <li class="mb-4 pl-3 border-l-4 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                            <span class="">Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="flex-grow ml-64">
            <!-- top menu -->
            <header class="flex items-center justify-between bg-white px-6 shadow">
                <ul class="text-sm font-bold flex items-center space-x-4">
                    <li class="p-3 border-b-2 border-primary">
                        <a href="/" class="flex items-center space-x-2 text-dark transition">
                            Home
                        </a>
                    </li>
                    <li class="p-3 border-b-2 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            Documentation
                        </a>
                    </li>
                    <li class="p-3 border-b-2 border-transparent">
                        <a href="#" class="flex items-center space-x-2 text-theme-text hover:text-dark transition">
                            Licence
                        </a>
                    </li>
                </ul>
                <!-- top menu (profile) -->
                <div class="flex items-center space-x-4">
                    <!-- icon notification -->
                    <div class="relative cursor-pointer text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-2 py-2 rounded-xl border">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <!-- profile -->
                    <div class="relative cursor-pointer text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-4 py-2 rounded-xl border">
                        <div class="flex items-center space-x-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="ml-2">Super Admin</span>
                            <span class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <!-- dropdown logout -->
                        <div class="absolute top-10 right-0 transition translate-y-10 flex flex-col px-4 py-2 bg-theme-layout border-l border-r border-b shadow rounded-b divide-y divide-gray-100 divide-double">
                            <span class="text-xs pb-1 font-normal text-gray-300">Manage Profile</span>
                            <a href="#" class="py-2 flex items-center space-x-2 text-theme-text hover:text-dark transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="">Profile</span>
                            </a>
                            <a href="#" class="py-2 flex items-center space-x-2 pb-3 text-theme-text hover:text-dark transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="w-full p-10">

                <div class="my-10 mx-auto max-w-lg bg-theme-layout p-10 rounded shadow-sm">

                    <!-- input field with label -->
                    <div class="my-4">
                        <label for="fieldname" class="block mb-1 text-theme-text text-sm uppercase font-medium">User Name</label>
                        <input type="text" placeholder="User Name" class="px-3 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1">
                    </div>        
                    <!-- input field with label and icon -->
                    <div class="my-4">
                        <label for="fieldname" class="block mb-1 text-theme-text text-sm uppercase font-medium">User Name</label>
                        <div class="relative">
                            <input type="text" placeholder="User Name" class="pr-2 pl-10 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1">
                            <div class="absolute top-3 left-2 text-theme-text">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>       
                    <!-- input field with icon -->
                    <div class="my-4">
                        <div class="relative">
                            <input type="password" placeholder="password" class="pr-2 pl-10 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1">
                            <div class="absolute top-3 left-2 text-theme-text border-r border-gray-300 pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                        </div>
                    </div>       
                    <!-- input field with error -->
                    <div class="my-4">
                        <div class="relative">
                            <input type="email" placeholder="yourmail@demo.com" class="pr-2 pl-10 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1 ring-warning">
                            <div class="absolute top-3 left-2 text-warning border-r border-warning pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                        </div>
                    </div>       
                    <!-- input field with success and right icon -->
                    <div class="my-4">
                        <div class="relative w-96">
                            <input type="email" placeholder="mail@demo.com" class="w-full px-3 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1 ring-success">
                            <div class="absolute top-3 right-2 text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- select field -->
                    <div class="my-4 mt-10">
                        <label for="fieldname" class="block mb-2 text-theme-text text-sm uppercase font-medium">Select Item</label>
                        <select name="fieldname" class="w-64 px-3 py-2 rounded-md bg-theme-bg2 focus:outline-none ring-1">
                            <option value="">--select--</option>
                            <option value="1">item one</option>
                            <option value="2">item two</option>
                            <option value="3">item three</option>
                            <option value="4">item four</option>
                        </select>
                    </div>

                    <!-- multiple checkbox field -->
                    <div class="my-4 mt-10">
                        <label for="fieldname" class="block mb-2 text-theme-text text-sm uppercase font-medium">Select Items (checkbox)</label>
                        <div class="inline-flex flex-col space-y-2">
                            <label for="fieldname1" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="checkbox" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname1">
                                <span>CSS</span>
                            </label>
                            <label for="fieldname2" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="checkbox" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname2">
                                <span>Laravel</span>
                            </label>
                            <label for="fieldname3" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="checkbox" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname3">
                                <span>Vue 3</span>
                            </label>
                            <label for="fieldname4" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="checkbox" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname4">
                                <span>Inertia JS</span>
                            </label>
                        </div>
                    </div>

                    <!-- radio input field -->
                    <div class="my-4 mt-10">
                        <label for="fieldname" class="block mb-2 text-theme-text text-sm uppercase font-medium">Select Items (radio)</label>
                        <div class="inline-flex flex-col space-y-2">
                            <label for="fieldname1" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="radio" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname1">
                                <span>CSS</span>
                            </label>
                            <label for="fieldname2" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="radio" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname2">
                                <span>Laravel</span>
                            </label>
                            <label for="fieldname3" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="radio" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname3">
                                <span>Vue 3</span>
                            </label>
                            <label for="fieldname4" class="flex items-center space-x-2 text-theme-color text-sm uppercase font-medium cursor-pointer">
                                <input type="radio" name="fieldname" class="w-4 h-4 cursor-pointer" id="fieldname4">
                                <span>Inertia JS</span>
                            </label>
                        </div>
                    </div>

                    <!-- button -->
                    <div class="my-10">
                        <div class="flex space-x-4">
                            <a href="/register" class="text-xs text-white font-semibold bg-purple-600 hover:bg-primary transition px-4 py-2 rounded-xl border border-transparent">primary link</a>

                            <a href="/login" class="text-xs text-primary font-semibold bg-theme-bg hover:bg-theme-bg2 hover:text-opacity-80 transition px-4 py-2 rounded-xl border">Secondary link</a>

                        </div>
                    </div>

                </div>
                

                <div class="my-10 mx-auto max-w-lg bg-theme-layout p-10 rounded shadow">
                    <div class="flex space-x-3">
                        <button type="button" class="text-xs text-white font-semibold bg-primary hover:bg-purple-900 transition px-4 py-2 rounded-xl border border-transparent">Primary</button>

                        <button type="button" class="text-xs text-white font-semibold bg-success hover:bg-green-600 transition px-4 py-2 rounded-xl border border-transparent">Success</button>

                        <button type="button" class="text-xs text-white font-semibold bg-warning hover:bg-yellow-600 transition px-4 py-2 rounded-xl border border-transparent">Warning</button>

                        <button type="button" class="text-xs text-white font-semibold bg-dark hover:bg-gray-800 transition px-4 py-2 rounded-xl border border-transparent">Dark</button>
                    </div>
                </div>

                <div class="p-10">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum pariatur voluptas, inventore, laudantium quis accusantium, omnis praesentium est explicabo ab eveniet placeat. Animi, quod laudantium corporis voluptatem minus culpa cumque.</p>

                    <!-- Typography -->
                    <div class="my-6">
                        <h1>Heading one</h1>
                        <h2>Heading two</h2>
                        <h3>Heading three</h3>
                        <h6>Heading six</h6>
                        <caption>caption description</caption>
                        <br>
                        <a href="#">link</a>
                    </div>
                    <!-- colors -->
                    <div class="flex items-center space-x-4 text-xs py-10">
                        <div class="h-20 w-20 p-2 bg-theme-text">theme-text</div>
                        <div class="h-20 w-20 p-2 bg-theme-color">theme-color</div>
                        <div class="h-20 w-20 p-2 bg-theme-layout">theme-layout</div>
                        <div class="h-20 w-20 p-2 bg-theme-bg">theme-bg</div>
                        <div class="h-20 w-20 p-2 bg-theme-bg2">theme-bg2</div>
                        <div class="h-20 w-20 p-2 bg-theme-code">theme-code</div>
                        <div class="h-20 w-20 p-2 bg-theme-code2">theme-code2</div>
                    </div>
                    <div class="flex items-center space-x-4 text-xs">
                        <div class="h-20 w-20 p-2 bg-primary">primary</div>
                        <div class="h-20 w-20 p-2 bg-success">success</div>
                        <div class="h-20 w-20 p-2 bg-warning">warning</div>
                        <div class="h-20 w-20 p-2 bg-dark">dark</div>
                    </div>
                </div>

                <h1>Table Component</h1>
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                    Jane Cooper
                                    </div>
                                    <div class="text-sm text-gray-500">
                                    jane.cooper@example.com
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                <div class="text-sm text-gray-500">Optimization</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Admin
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            </tr>

                            <!-- More people... -->
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>

            </main>
        </div>
    </div>
</template>