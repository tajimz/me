<script setup>
import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    projects: Array,
});
</script>

<template>
    <AdminLayout>
        <!-- Header -->
        <header class="mb-12">
            <h1 class="text-4xl font-black tracking-tighter text-slate-900">Projects</h1>
            <p class="mt-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                Manage your projects
            </p>
        </header>

        <!-- Table -->
        <div class="rounded-3xl border border-slate-200 bg-white overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Name</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Type</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <tr v-for="project in projects" :key="project.id" class="hover:bg-slate-50">
                        <td class="p-6 font-bold text-slate-900">{{ project.name }}</td>
                        <td class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-500">{{ project.type }}</td>
                        <td class="p-6 text-right">
                            <Link 
                                :href="`/admin/projects/${project.id}/edit`" 
                                class="text-[10px] font-black uppercase tracking-widest text-indigo-600 hover:text-indigo-900 mr-4"
                            >
                                Edit
                            </Link>
                            <Link 
                                :href="`/admin/projects/${project.id}`" 
                                method="delete" 
                                as="button"
                                class="text-[10px] font-black uppercase tracking-widest text-red-500 hover:text-red-700"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>

<style scoped>
</style>