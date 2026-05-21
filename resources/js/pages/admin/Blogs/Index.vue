<script setup>
import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    blogs: Array,
});
</script>

<template>
    <AdminLayout>
        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between md:items-end mb-12 gap-6">
            <div>
                <h1 class="text-4xl font-black tracking-tighter text-slate-900">Manage Blogs</h1>
                <p class="mt-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                    {{ blogs.length }} Total Posts
                </p>
            </div>
            <Link 
                href="/admin/blogs/create" 
                class="bg-slate-900 px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-indigo-600 transition-all shadow-lg shadow-indigo-600/20 text-center"
            >
                + New Post
            </Link>
        </header>

        <!-- Data Table -->
        <div class="rounded-3xl border border-slate-200 bg-white overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="hidden md:table-header-group">
                    <tr class="border-b border-slate-200 bg-slate-50/50">
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400">Title</th>
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400">Date</th>
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400 text-center">Views</th>
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="blog in blogs" :key="blog.id" class="flex flex-col md:table-row hover:bg-slate-50/50 transition-colors p-6 md:p-0">
                        <!-- Title (Always visible) -->
                        <td class="md:p-6 font-bold text-slate-900 text-lg md:text-base mb-2 md:mb-0">
                            {{ blog.title }}
                        </td>
                        
                        <!-- Mobile-only meta row -->
                        <td class="md:p-6 flex gap-4 md:hidden text-[9px] font-black uppercase tracking-widest text-slate-400 mb-4">
                            <span>{{ new Date(blog.created_at).toLocaleDateString() }}</span>
                            <span>{{ blog.views || 0 }} Views</span>
                        </td>

                        <!-- Desktop columns (Hidden on mobile) -->
                        <td class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400 hidden md:table-cell">
                            {{ new Date(blog.created_at).toLocaleDateString() }}
                        </td>
                        <td class="p-6 text-center text-xs font-bold text-slate-600 hidden md:table-cell">
                            {{ blog.views || 0 }}
                        </td>

                        <!-- Actions (Always visible) -->
                        <td class="pt-4 md:p-6 text-left md:text-right flex gap-6 md:justify-end border-t md:border-t-0 border-slate-100">
                            <Link 
                                :href="`/admin/blogs/${blog.id}/edit`" 
                                class="text-[10px] font-black uppercase tracking-widest text-indigo-600 hover:text-slate-900"
                            >
                                Edit
                            </Link>
                            <Link 
                                :href="`/admin/blogs/${blog.id}`" 
                                method="delete" 
                                as="button"
                                preserve-scroll
                                class="text-[10px] font-black uppercase tracking-widest text-red-500 hover:text-red-700"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Empty State -->
            <div v-if="blogs.length === 0" class="p-16 text-center">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">No blogs found yet.</p>
                <Link href="/admin/blogs/create" class="mt-4 inline-block text-indigo-600 font-black text-[10px] uppercase tracking-widest">Start Writing →</Link>
            </div>
        </div>
    </AdminLayout>
</template>