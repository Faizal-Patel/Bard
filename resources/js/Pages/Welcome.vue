<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isMenuOpen = ref(false);

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-light text-dark min-h-screen flex flex-col justify-between items-center bg-image">
        <header class="w-full flex justify-between items-center p-4 bg-opacity-50 bg-gray-800 text-white fixed top-0 z-10">
            <div class="text-2xl">Bard</div>
            <button
                class="lg:hidden p-2 focus:outline-none"
                @click="isMenuOpen = !isMenuOpen"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zM3 9h14a1 1 0 010 2H3a1 1 0 010-2zM3 13h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
                </svg>
            </button>
            <nav
                :class="{'block': isMenuOpen, 'hidden': !isMenuOpen}"
                class="absolute top-16 right-0 w-full lg:static lg:w-auto lg:flex lg:items-center lg:space-x-4 bg-gray-800 lg:bg-transparent p-4 lg:p-0"
            >
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="block lg:inline-block text-white p-2 lg:p-0"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="block lg:inline-block text-white p-2 lg:p-0"
                    >
                        Log in
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="block lg:inline-block text-white p-2 lg:p-0"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
        <div class="flex-grow"></div> <!-- This will push the footer to the bottom -->
        <footer class="w-full text-center text-muted bg-opacity-50 bg-gray-800 p-4 fixed bottom-0">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
</template>