<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <!-- Kept sticky navigation clean -->
    <nav class="sticky top-0 z-50 border-b border-slate-200/60 bg-white/70 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <!-- Brand Logo -->
            <Link href="/" class="text-xl font-black tracking-tighter text-indigo-600">
                TR.TAJIM
            </Link>

            <div class="flex space-x-8 text-xs font-bold tracking-widest text-slate-600 uppercase">
                <Link href="/" class="transition hover:text-indigo-600">Home</Link>
                <Link href="/blogs" class="transition hover:text-indigo-600">Blogs</Link>
                <Link href="/projects" class="transition hover:text-indigo-600">Projects</Link>
            </div>
        </div>
    </nav>

    <!-- Fixed wrapper: Changed to block flow layout with vertical padding -->
    <main>
        <slot />
    </main>
</template>