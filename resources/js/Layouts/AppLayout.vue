<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isOpen = ref(false);
</script>

<template>
    <!-- Navigation -->
    <nav
        class="sticky top-0 z-50 border-b border-slate-200/60 bg-white/70 backdrop-blur-md"
    >
        <div
            class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4"
        >
            <!-- Brand -->
            <Link
                href="/"
                class="text-xl font-black tracking-tighter text-indigo-600"
            >
                TR.TAJIM
            </Link>

            <!-- Desktop Menu -->
            <div
                class="hidden space-x-8 text-xs font-bold tracking-widest text-slate-600 uppercase md:flex"
            >
                <Link href="/" class="transition hover:text-indigo-600"
                    >Home</Link
                >
                <Link href="/blogs" class="transition hover:text-indigo-600"
                    >Blogs</Link
                >
                <Link href="/projects" class="transition hover:text-indigo-600"
                    >Projects</Link
                >
            </div>

            <!-- Mobile Menu Button -->
            <button
                @click="isOpen = !isOpen"
                class="p-2 text-slate-600 md:hidden"
            >
                <span class="text-xl">☰</span>
            </button>
        </div>

        <!-- Mobile Dropdown -->
        <div
            v-if="isOpen"
            class="flex flex-col gap-4 border-t border-slate-100 bg-white px-6 py-4 text-xs font-bold tracking-widest text-slate-600 uppercase md:hidden"
        >
            <Link href="/" @click="isOpen = false">Home</Link>
            <Link href="/blogs" @click="isOpen = false">Blogs</Link>
            <Link href="/projects" @click="isOpen = false">Projects</Link>
        </div>
    </nav>

    <main>
        <slot />
    </main>

    <!-- Footer -->
    <footer class="mt-20 border-t border-slate-200/60 bg-slate-50/50">
        <div class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 md:grid-cols-3">
                <!-- Brand & Bio -->
                <div class="col-span-1">
                    <Link
                        href="/"
                        class="mb-4 block text-2xl font-black tracking-tighter text-indigo-600"
                    >
                        TR.TAJIM
                    </Link>
                    <p class="max-w-xs text-sm leading-relaxed text-slate-500">
                        Full stack developer crafting digital experiences with
                        Laravel, Vue.js, and hardware integration.
                    </p>
                </div>

                <!-- Navigation Links -->
                <div class="flex flex-col gap-4">
                    <h4
                        class="text-xs font-black tracking-widest text-slate-900 uppercase"
                    >
                        Explore
                    </h4>
                    <Link
                        href="/"
                        class="text-sm font-medium text-slate-600 transition hover:text-indigo-600"
                        >Home</Link
                    >
                    <Link
                        href="/blogs"
                        class="text-sm font-medium text-slate-600 transition hover:text-indigo-600"
                        >All Blogs</Link
                    >
                    <Link
                        href="/projects"
                        class="text-sm font-medium text-slate-600 transition hover:text-indigo-600"
                        >All Projects</Link
                    >
                </div>

                <!-- Connect -->
                <div class="flex flex-col gap-4">
                    <h4
                        class="text-xs font-black tracking-widest text-slate-900 uppercase"
                    >
                        Connect
                    </h4>
                    <a
                        href="mailto:com.tajim@gmail.com"
                        class="text-sm font-medium text-slate-600 transition hover:text-indigo-600"
                        >Email Me</a
                    >
                    <a
                        href="https://github.com/tajimz"
                        class="text-sm font-medium text-slate-600 transition hover:text-indigo-600"
                        >GitHub</a
                    >
                    <a
                        href="https://linkedin.com/in/tajimz"
                        class="text-sm font-medium text-slate-600 transition hover:text-indigo-600"
                        >LinkedIn</a
                    >
                </div>
            </div>

            <!-- Bottom Bar -->
            <div
                class="mt-16 flex flex-col items-center justify-between gap-4 border-t border-slate-200/60 pt-8 text-center text-xs font-bold text-slate-400 md:flex-row"
            >
                <p>
                    © {{ new Date().getFullYear() }} Tajbir Roman Tajim. All
                    rights reserved.
                </p>
                <span>Designed with Vue & Laravel</span>
            </div>
        </div>
    </footer>
</template>
