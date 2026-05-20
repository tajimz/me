<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProjectCard from '@/Components/ProjectCard.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    projects: Array,
});

const filter = ref('all');

const filteredProjects = computed(() => {
    if (filter.value === 'all') return props.projects;
    return props.projects.filter((p) => p.type === filter.value);
});
</script>

<template>
    <AppLayout>
        <!-- Background Gradients -->
        <div class="pointer-events-none fixed inset-0 z-0">
            <div
                class="absolute top-[-10%] left-[-10%] h-[50%] w-[50%] rounded-full bg-indigo-200/40 blur-[120px]"
            ></div>
            <div
                class="absolute right-[-5%] bottom-[10%] h-[40%] w-[40%] rounded-full bg-violet-200/30 blur-[100px]"
            ></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 py-12 md:py-20">
            <!-- Header Section -->
            <div class="mx-auto mb-12 max-w-2xl text-center md:mb-16">
                <div
                    class="mb-4 inline-block rounded-full border border-indigo-100 bg-indigo-50 px-4 py-1.5 text-xs font-bold tracking-widest text-indigo-600 uppercase"
                >
                    Engineering Showcase
                </div>
                <h1
                    class="mb-6 text-4xl font-black tracking-tight text-slate-900 sm:text-5xl md:text-6xl"
                >
                    Architected Projects.
                </h1>
                <p
                    class="px-2 text-base leading-relaxed text-slate-600 md:text-lg"
                >
                    Explore production utilities, native environments, and
                    embedded devices designed from the ground up to solve
                    technical constraints elegantly.
                </p>
            </div>

            <!-- Filter Buttons: Adjusted for mobile wrap -->
            <div class="mb-10 flex justify-center md:mb-14">
                <div
                    class="flex flex-wrap justify-center gap-1.5 rounded-2xl border border-slate-200/60 bg-white/60 p-1.5 shadow-sm backdrop-blur-sm"
                >
                    <button
                        @click="filter = 'all'"
                        :class="
                            filter === 'all'
                                ? 'bg-slate-900 text-white shadow-md'
                                : 'text-slate-600 hover:bg-slate-50/80'
                        "
                        class="min-w-[100px] flex-1 rounded-xl px-4 py-2.5 text-[11px] font-black tracking-wider uppercase transition-all duration-200 md:text-xs"
                    >
                        All
                    </button>
                    <button
                        @click="filter = 'web'"
                        :class="
                            filter === 'web'
                                ? 'bg-indigo-600 text-white shadow-md shadow-indigo-100'
                                : 'text-slate-600 hover:bg-slate-50/80'
                        "
                        class="min-w-[100px] flex-1 rounded-xl px-4 py-2.5 text-[11px] font-black tracking-wider uppercase transition-all duration-200 md:text-xs"
                    >
                        Web
                    </button>
                    <button
                        @click="filter = 'app'"
                        :class="
                            filter === 'app'
                                ? 'bg-emerald-600 text-white shadow-md shadow-emerald-100'
                                : 'text-slate-600 hover:bg-slate-50/80'
                        "
                        class="min-w-[100px] flex-1 rounded-xl px-4 py-2.5 text-[11px] font-black tracking-wider uppercase transition-all duration-200 md:text-xs"
                    >
                        Native
                    </button>
                </div>
            </div>

            <!-- Card Grid -->
            <div
                v-if="filteredProjects.length > 0"
                class="grid gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3"
            >
                <ProjectCard
                    v-for="project in filteredProjects"
                    :key="project.id"
                    :project="project"
                />
            </div>

            <!-- Empty State Fallback -->
            <div
                v-else
                class="mx-2 rounded-3xl border border-dashed border-slate-200 bg-white/40 py-16 text-center backdrop-blur-sm md:py-24"
            >
                <svg
                    class="mx-auto mb-4 h-12 w-12 text-slate-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18a2.25 2.25 0 0 1 2.25 2.25v4.25A2.25 2.25 0 0 1 18 21H6a2.25 2.25 0 0 1-2.25-2.25v-4.25A2.25 2.25 0 0 1 2.25 13.5Z"
                    />
                </svg>
                <p class="px-4 font-bold text-slate-500">
                    No project items initialized under this category tag yet.
                </p>
            </div>
        </div>
    </AppLayout>
</template>
