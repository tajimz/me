<script setup>
import {
    Github,
    ExternalLink,
    Download,
    Globe,
    Smartphone,
    Server,
} from 'lucide-vue-next';

defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <article
        class="group relative flex flex-col justify-between overflow-hidden rounded-3xl border border-slate-200/70 bg-white/70 p-4 shadow-sm backdrop-blur-md transition-all duration-500 hover:-translate-y-1 hover:border-indigo-100 hover:bg-white hover:shadow-xl hover:shadow-indigo-100/50 sm:p-5"
    >
        <div>
            <!-- Card Media & Type Badge -->
            <div
                class="relative mb-5 aspect-[16/10] w-full overflow-hidden rounded-2xl border border-slate-100 bg-slate-100"
            >
                <img
                    :src="project.cover_image"
                    :alt="project.name"
                    class="h-full w-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                />

                <span
                    class="absolute top-3 left-3 flex items-center gap-1.5 rounded-lg bg-slate-900/90 px-2.5 py-1 text-[9px] font-black tracking-widest text-white uppercase shadow-md backdrop-blur-sm"
                >
                    <Globe
                        v-if="project.type === 'web'"
                        class="h-3 w-3 text-indigo-400"
                    />
                    <Smartphone
                        v-else-if="project.type === 'app'"
                        class="h-3 w-3 text-emerald-400"
                    />
                    <Server v-else class="h-3 w-3 text-violet-400" />
                    {{ project.type }}
                </span>
            </div>

            <!-- Project Name & Details -->
            <h3
                class="mb-2 text-xl font-black tracking-tight text-slate-900 transition-colors duration-300 group-hover:text-indigo-600 sm:text-2xl"
            >
                {{ project.name }}
            </h3>

            <p class="mb-5 line-clamp-3 text-sm leading-relaxed text-slate-500">
                {{ project.details }}
            </p>

            <!-- Tech Pills -->
            <div
                v-if="project.tags && project.tags.trim() !== ''"
                class="mb-5 flex flex-wrap gap-1.5"
            >
                <span
                    v-for="tag in project.tags.split(',')"
                    :key="tag"
                    class="rounded-md border border-slate-100 bg-slate-50 px-2 py-1 text-[9px] font-bold tracking-wide text-slate-500 transition-colors group-hover:border-indigo-100 group-hover:bg-indigo-50/50 group-hover:text-indigo-600 sm:text-[10px]"
                >
                    {{ tag.trim() }}
                </span>
            </div>
        </div>

        <!-- Actions Dock -->
        <div class="flex items-center gap-2 border-t border-slate-100 pt-4">
            <!-- GitHub: Increased touch area -->
            <a
                v-if="project.github_url"
                :href="project.github_url"
                target="_blank"
                title="View Codebase Source"
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition-all hover:border-indigo-200 hover:bg-slate-50 hover:text-indigo-600"
            >
                <Github class="h-5 w-5" />
            </a>

            <!-- Download / Demo: Standardized button height for easier mobile tapping -->
            <a
                v-if="project.download_url"
                :href="project.download_url"
                download
                class="flex h-12 flex-1 items-center justify-center gap-2 rounded-xl bg-slate-900 px-3 text-xs font-bold text-white shadow-md transition-all hover:bg-slate-800"
            >
                <Download class="h-4 w-4" /> Download
            </a>

            <a
                v-if="project.live_url"
                :href="project.live_url"
                target="_blank"
                class="flex h-12 flex-1 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-3 text-xs font-bold text-white shadow-lg shadow-indigo-100 transition-all hover:bg-indigo-700"
            >
                Demo <ExternalLink class="h-4 w-4" />
            </a>
        </div>
    </article>
</template>
