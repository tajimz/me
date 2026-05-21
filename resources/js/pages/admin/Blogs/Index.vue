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
        <header class="flex justify-between items-end mb-12">
            <div>
                <h1 class="text-4xl font-black tracking-tighter text-slate-900">Manage Blogs</h1>
                <p class="mt-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                    {{ blogs.length }} Total Posts
                </p>
            </div>
            <Link 
                href="/admin/blogs/create" 
                class="bg-slate-900 px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-indigo-600 transition-all shadow-lg shadow-indigo-600/20"
            >
                + New Post
            </Link>
        </header>

        <!-- Data Table -->
        <div class="rounded-3xl border border-slate-200 bg-white overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50/50">
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400">Title</th>
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400">Date</th>
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400 text-center">Views</th>
                        <th class="p-6 text-[9px] font-black uppercase tracking-widest text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="blog in blogs" :key="blog.id" class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-6 font-bold text-slate-900">{{ blog.title }}</td>
                        <td class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">
                            {{ new Date(blog.created_at).toLocaleDateString() }}
                        </td>
                        <!-- Added Views Column -->
                        <td class="p-6 text-center text-xs font-bold text-slate-600">
                            {{ blog.views || 0 }}
                        </td>
                        <td class="p-6 text-right space-x-4">
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