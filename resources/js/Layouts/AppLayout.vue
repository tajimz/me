<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <!-- Kept sticky navigation clean -->
    <nav
        class="sticky top-0 z-50 border-b border-slate-200/60 bg-white/70 backdrop-blur-md"
    >
        <div
            class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4"
        >
            <!-- Brand Logo -->
            <Link
                href="/"
                class="text-xl font-black tracking-tighter text-indigo-600"
            >
                TR.TAJIM
            </Link>

            <div
                class="flex space-x-8 text-xs font-bold tracking-widest text-slate-600 uppercase"
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
        </div>
    </nav>

    <!-- Fixed wrapper: Changed to block flow layout with vertical padding -->
    <main>
        <slot />
    </main>
    <!-- Footer -->
    <footer class="mt-20 border-t border-slate-200/60 bg-slate-50/50">
        <div class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-12 md:grid-cols-3">
                <!-- Brand & Bio -->
                <div class="col-span-1 md:col-span-1">
                    <Link
                        href="/"
                        class="mb-4 block text-2xl font-black tracking-tighter text-indigo-600"
                    >
                        TR.TAJIM
                    </Link>
                    <p class="max-w-xs text-sm leading-relaxed text-slate-500">
                        Full stack developer crafting digital experiences with
                        Laravel, Vue.js, and a passion for hardware integration.
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
                class="mt-16 flex flex-col items-center justify-between border-t border-slate-200/60 pt-8 text-xs font-bold text-slate-400 md:flex-row"
            >
                <p>
                    © {{ new Date().getFullYear() }} Tajbir Roman Tajim. All
                    rights reserved.
                </p>
                <div class="mt-4 flex gap-6 md:mt-0">
                    <span>Designed with Vue & Laravel</span>
                </div>
            </div>
        </div>
    </footer>
</template>
