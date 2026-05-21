<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const page = usePage();
const navLinks = [
    { name: 'Dashboard', href: '/admin' },
    { name: 'Blogs', href: '/admin/blogs' },
    { name: 'Projects', href: '/admin/projects' },
    { name: 'Log Out', href: '/logout' },
];

const isActive = (href) => page.url === href || page.url.startsWith(href + '/');
</script>

<template>
    <!-- We remove the max-w-6xl from AppLayout here to let the admin look "go wide" -->
    <AppLayout>
        <div class="flex min-h-screen">
            <!-- Sidebar: Full Height, Slim, Tech-focused -->
            <aside
                class="hidden w-64 flex-col border-r border-slate-200 bg-slate-50/50 pt-12 md:flex"
            >
                <div class="mb-12 px-8">
                    <p
                        class="text-[9px] font-black tracking-[0.2em] text-slate-400 uppercase"
                    >
                        Admin Panel
                    </p>
                </div>

                <nav class="flex flex-col gap-1 px-4">
                    <Link
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        :class="[
                            'flex items-center gap-3 rounded-xl px-4 py-3 text-[10px] font-black tracking-widest uppercase transition-all',
                            isActive(link.href)
                                ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20'
                                : 'text-slate-500 hover:bg-slate-200',
                        ]"
                    >
                        {{ link.name }}
                    </Link>
                </nav>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 bg-white p-12">
                <!-- Removed mx-auto and max-w-5xl so it aligns to the left -->
                <div class="w-full">
                    <slot />
                </div>
            </main>
        </div>
    </AppLayout>
</template>
