<script setup>
import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    stats: Object,
});

// Helper to format numbers (e.g., 1200 -> 1.2K)
const formatCount = (num) => {
    if (num >= 1000000) return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
    if (num >= 1000) return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
    return num;
};
</script>

<template>
    <AdminLayout>
        <!-- Header -->
        <header class="mb-12">
            <h1 class="text-4xl font-black tracking-tighter text-slate-900">Dashboard</h1>
            <p class="mt-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-400">Welcome back, Tajim.</p>
        </header>

        <!-- Stats Grid (Expanded to 3 columns) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            
            <!-- Project Stat -->
            <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 transition-all hover:border-indigo-600">
                <div class="relative z-10">
                    <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Total Projects</h2>
                    <p class="mt-2 text-5xl font-black text-slate-900">{{ formatCount(stats.projects_count) }}</p>
                </div>
                <Link href="/admin/projects/create" class="mt-8 inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-indigo-600 transition-transform group-hover:translate-x-2">
                    Add New Project →
                </Link>
                <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-slate-50 transition-colors group-hover:bg-indigo-50"></div>
            </div>

            <!-- Blog Stat -->
            <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 transition-all hover:border-indigo-600">
                <div class="relative z-10">
                    <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Total Blogs</h2>
                    <p class="mt-2 text-5xl font-black text-slate-900">{{ formatCount(stats.posts_count) }}</p>
                </div>
                <Link href="/admin/blogs/create" class="mt-8 inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-indigo-600 transition-transform group-hover:translate-x-2">
                    Add New Blog →
                </Link>
                <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-slate-50 transition-colors group-hover:bg-indigo-50"></div>
            </div>

            <!-- Views Stat (Example of the 3rd card) -->
            <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 transition-all hover:border-indigo-600">
                <div class="relative z-10">
                    <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Total Blog Views</h2>
                    <!-- Assuming you pass total_post_views from controller -->
                    <p class="mt-2 text-5xl font-black text-slate-900">{{ formatCount(stats.total_post_views || 0) }}</p>
                </div>
                <div class="mt-8 text-[10px] font-black uppercase tracking-widest text-slate-300">Lifetime Traffic</div>
                <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-slate-50 transition-colors group-hover:bg-indigo-50"></div>
            </div>
        </div>

        <!-- Quick Info / Section -->
        <div class="rounded-3xl border border-slate-100 bg-slate-50/50 p-8">
            <h3 class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-6">System Status</h3>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-green-500"></div>
                    <span class="text-xs font-bold text-slate-600">Database Connected</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-green-500"></div>
                    <span class="text-xs font-bold text-slate-600">Storage Optimized</span>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>