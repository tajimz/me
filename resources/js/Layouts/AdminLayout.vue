<script setup>
import { Link, usePage, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const page = usePage();

const navLinks = [
    { name: 'Dashboard', href: '/admin' },
    { name: 'Blogs', href: '/admin/blogs' },
    { name: 'Projects', href: '/admin/projects' },
    { name: 'Log Out', href: '/logout' },
];

const handleLogout = () => {
    if (confirm('Are you sure you want to log out?')) {
        router.post('/logout');
    }
};

const isActive = (href) => {
    if (href === '/admin') return page.url === '/admin';
    return page.url.startsWith(href);
};
</script>

<template>
    <AppLayout>
        <div class="flex min-h-screen flex-col md:flex-row">
            <aside
                class="flex w-full flex-col border-b border-slate-200 bg-white pt-6 pb-2 md:w-64 md:border-r md:border-b-0 md:pt-12 md:pb-0"
            >
                <div class="mb-8 hidden px-8 md:block">
                    <p
                        class="text-[9px] font-black tracking-[0.2em] text-slate-400 uppercase"
                    >
                        Admin Panel
                    </p>
                </div>

                <nav
                    class="flex flex-row justify-center gap-1 overflow-x-auto px-2 pb-2 md:flex-col md:overflow-visible md:px-4 md:pb-0"
                >
                    <!-- Regular Links -->
                    <template v-for="link in navLinks" :key="link.href">
                        <button
                            v-if="link.name === 'Log Out'"
                            @click="handleLogout"
                            :class="[
                                'flex shrink-0 items-center justify-center rounded-xl px-3 py-2 text-[9px] font-black tracking-widest uppercase transition-all duration-200 md:w-full md:justify-start md:px-4 md:py-3 md:text-[10px]',
                                'text-slate-400 hover:bg-slate-100 hover:text-slate-900',
                            ]"
                        >
                            Log Out
                        </button>

                        <Link
                            v-else
                            :href="link.href"
                            :class="[
                                'flex shrink-0 items-center justify-center rounded-xl px-3 py-2 text-[9px] font-black tracking-widest uppercase transition-all duration-200 md:w-full md:justify-start md:px-4 md:py-3 md:text-[10px]',
                                isActive(link.href)
                                    ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20'
                                    : 'text-slate-400 hover:bg-slate-100 hover:text-slate-900',
                            ]"
                        >
                            {{ link.name }}
                        </Link>
                    </template>
                </nav>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 bg-slate-50/30 p-6 md:p-12">
                <div class="w-full">
                    <slot />
                </div>
            </main>
        </div>
    </AppLayout>
</template>
