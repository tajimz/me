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
        <header class="mb-12 flex items-end justify-between">
            <div>
                <h1 class="text-4xl font-black tracking-tighter text-slate-900">
                    Manage Projects
                </h1>
                <p
                    class="mt-2 text-[10px] font-black tracking-[0.2em] text-slate-400 uppercase"
                >
                    {{ projects.length }} Total Projects
                </p>
            </div>
            <Link
                href="/admin/projects/create"
                class="rounded-xl bg-slate-900 px-8 py-3 text-[10px] font-black tracking-widest text-white uppercase shadow-lg shadow-indigo-600/20 transition-all hover:bg-indigo-600"
            >
                + New Project
            </Link>
        </header>

        <!-- Table -->
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white"
        >
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th
                            class="p-6 text-[10px] font-black tracking-widest text-slate-400 uppercase"
                        >
                            Name
                        </th>
                        <th
                            class="p-6 text-[10px] font-black tracking-widest text-slate-400 uppercase"
                        >
                            Type
                        </th>
                        <th
                            class="p-6 text-right text-[10px] font-black tracking-widest text-slate-400 uppercase"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <tr
                        v-for="project in projects"
                        :key="project.id"
                        class="hover:bg-slate-50"
                    >
                        <td class="p-6 font-bold text-slate-900">
                            {{ project.name }}
                        </td>
                        <td
                            class="p-6 text-[10px] font-black tracking-widest text-slate-500 uppercase"
                        >
                            {{ project.type }}
                        </td>
                        <td class="p-6 text-right">
                            <Link
                                :href="`/admin/projects/${project.id}/edit`"
                                class="mr-4 text-[10px] font-black tracking-widest text-indigo-600 uppercase hover:text-indigo-900"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="`/admin/projects/${project.id}`"
                                method="delete"
                                as="button"
                                class="text-[10px] font-black tracking-widest text-red-500 uppercase hover:text-red-700"
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

<style scoped></style>
