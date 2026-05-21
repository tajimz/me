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

// Helper to determine if the route is active
const isActive = (href) => {
    // Exact match for Dashboard, prefix match for others
    if (href === '/admin') return page.url === '/admin';
    return page.url.startsWith(href);
};
</script>

<template>
    <AppLayout>
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside
                class="hidden w-64 flex-col border-r border-slate-200 bg-white pt-12 md:flex"
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
                        :method="link.name === 'Log Out' ? 'post' : 'get'"
                        :as="link.name === 'Log Out' ? 'button' : 'a'"
                        :class="[
                            'flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-[10px] font-black tracking-widest uppercase transition-all duration-200',
                            isActive(link.href)
                                ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20'
                                : 'text-slate-400 hover:bg-slate-100 hover:text-slate-900',
                        ]"
                    >
                        {{ link.name }}
                    </Link>
                </nav>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 bg-slate-50/30 p-12">
                <div class="w-full">
                    <slot />
                </div>
            </main>
        </div>
    </AppLayout>
</template>
