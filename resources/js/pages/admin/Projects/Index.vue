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
        <header class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="text-4xl font-black tracking-tighter text-slate-900">
                    Manage Projects
                </h1>
                <p class="mt-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                    {{ projects.length }} Total Projects
                </p>
            </div>
            <Link
                href="/admin/projects/create"
                class="rounded-xl bg-slate-900 px-8 py-3 text-center text-[10px] font-black uppercase tracking-widest text-white shadow-lg shadow-indigo-600/20 transition-all hover:bg-indigo-600"
            >
                + New Project
            </Link>
        </header>

        <!-- Table -->
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white">
            <table class="w-full text-left border-collapse">
                <thead class="hidden md:table-header-group">
                    <tr class="border-b border-slate-100 bg-slate-50/50">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Name</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Type</th>
                        <th class="p-6 text-right text-[10px] font-black uppercase tracking-widest text-slate-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr
                        v-for="project in projects"
                        :key="project.id"
                        class="flex flex-col p-6 hover:bg-slate-50/50 md:table-row md:p-0 transition-colors"
                    >
                        <!-- Name -->
                        <td class="mb-2 font-bold text-slate-900 md:mb-0 md:p-6 text-lg md:text-base">
                            {{ project.name }}
                        </td>
                        
                        <!-- Type -->
                        <td class="mb-4 md:mb-0 md:p-6 text-[10px] font-black tracking-widest text-slate-500 uppercase">
                            {{ project.type }}
                        </td>

                        <!-- Actions -->
                        <td class="flex gap-6 border-t border-slate-100 pt-4 md:border-t-0 md:p-6 md:justify-end">
                            <Link
                                :href="`/admin/projects/${project.id}/edit`"
                                class="text-[10px] font-black tracking-widest text-indigo-600 uppercase hover:text-slate-900"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="`/admin/projects/${project.id}`"
                                method="delete"
                                as="button"
                                preserve-scroll
                                class="text-[10px] font-black tracking-widest text-red-500 uppercase hover:text-red-700"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Empty State -->
            <div v-if="projects.length === 0" class="p-16 text-center">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">No projects created yet.</p>
                <Link href="/admin/projects/create" class="mt-4 inline-block text-indigo-600 font-black text-[10px] uppercase tracking-widest">Start Building →</Link>
            </div>
        </div>
    </AdminLayout>
</template>