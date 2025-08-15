<template>
    <div class="w-full flex flex-row p-3 md:p-9 md:px-16 bg-black font-helvetica items-center z-40">
        <div class="w-3/5 text-4xl font-extrabold text-teal-400">Lester</div>
        <div class="w-2/5 flex justify-end">
            <div class="hidden md:flex flex-row justify-between w-full items-center">
                <div>
                    <div
                        :class="{
                            'text-teal-400': isActive('/about'),
                            'text-gray-400': !isActive('/about')
                        }"
                    >
                        <router-link to="/about">About</router-link>
                    </div>
                    <div v-if="isActive('/about')" class="h-0.5 bg-teal-400 w-full mt-[7px]"></div>
                </div>

                <div>
                    <div
                        :class="{
                            'text-teal-400': isActive('/education'),
                            'text-gray-400': !isActive('/education')
                        }"
                    >
                        <router-link to="/education">Education</router-link>
                    </div>
                    <div v-if="isActive('/education')" class="h-0.5 bg-teal-400 w-full mt-[7px]"></div>
                </div>

                <div>
                    <div
                        :class="{
                            'text-teal-400': isActive('/portfolio'),
                            'text-gray-400': !isActive('/portfolio')
                        }"
                    >
                        <router-link to="/portfolio">Portfolio</router-link>
                    </div>
                    <div v-if="isActive('/portfolio')" class="h-0.5 bg-teal-400 w-full mt-[7px]"></div>
                </div>

                <div>
                    <div
                        :class="{
                            'text-teal-400': isActive('/skills'),
                            'text-gray-400': !isActive('/skills')
                        }"
                    >
                        <router-link to="/skills">Skills</router-link>
                    </div>
                    <div v-if="isActive('/skills')" class="h-0.5 bg-teal-400 w-full mt-[7px]"></div>
                </div>

                <div>
                    <div
                        :class="{
                            'text-teal-400': isActive('/awards'),
                            'text-gray-400': !isActive('/awards')
                        }"
                    >
                        <router-link to="/awards">Awards</router-link>
                    </div>
                    <div v-if="isActive('/awards')" class="h-0.5 bg-teal-400 w-full mt-[7px]"></div>
                </div>
            </div>

            <div class="flex md:hidden items-center relative">
                <button id="menuButton" class="text-white focus:outline-none flex items-center justify-center z-30">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div id="menuDropdown" class="hidden absolute top-[100%] right-0 bg-black text-white mt-2 rounded shadow-lg z-50">
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <router-link to="/about" class="block w-full">About</router-link>
                    </div>
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <router-link to="/education" class="block w-full">Education</router-link>
                    </div>
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <router-link to="/portfolio" class="block w-full">Portfolio</router-link>
                    </div>
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <router-link to="/skills" class="block w-full">Skills</router-link>
                    </div>
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <router-link to="/awards" class="block w-full">Awards</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useRoute } from 'vue-router';

export default {
    setup() {
        const route = useRoute();
        const isActive = (path) => route.path === path || (path === '/about' && route.path === '/');

        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('menuButton');
            const menuDropdown = document.getElementById('menuDropdown');

            if (menuButton && menuDropdown) {
                menuButton.addEventListener('click', () => {
                    menuDropdown.classList.toggle('hidden');
                    console.log('Toggled hidden:', menuDropdown.classList.contains('hidden'));
                });
            }
        });

        return { isActive };
    },
};
</script>