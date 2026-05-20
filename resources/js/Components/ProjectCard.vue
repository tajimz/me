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
        class="group relative flex flex-col justify-between overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/70 p-5 shadow-sm backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:border-indigo-100 hover:bg-white hover:shadow-2xl hover:shadow-indigo-100/50"
    >
        <div>
            <!-- 1. Card Media & Type Badge Visual Frame -->
            <div
                class="relative mb-6 aspect-[16/10] w-full overflow-hidden rounded-2xl border border-slate-100 bg-slate-100"
            >
                <img
                    :src="project.cover_image"
                    :alt="project.name"
                    class="h-full w-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                />

                <!-- 3. Dynamic Type Badge Indicator ('web', 'app', or custom extensions) -->
                <span
                    class="absolute top-3 left-3 flex items-center gap-1.5 rounded-xl bg-slate-900/90 px-3 py-1.5 text-[10px] font-black tracking-widest text-white uppercase shadow-md backdrop-blur-sm"
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

            <!-- 2. Project Name -->
            <h3
                class="mb-2 text-2xl font-black tracking-tight text-slate-900 transition-colors duration-300 group-hover:text-indigo-600"
            >
                {{ project.name }}
            </h3>

            <!-- 4. Project Details Context (Optimized size for multi-card grid grids) -->
            <p class="mb-6 line-clamp-3 text-sm leading-relaxed text-slate-500">
                {{ project.details }}
            </p>

            <!-- EXTRA: Inline Tech Pills Render (Mapped directly from dynamic json table data) -->
            <div
                v-if="project.tags && project.tags.trim() !== ''"
                class="mb-6 flex flex-wrap gap-1.5"
            >
                <span
                    v-for="tag in project.tags.split(',')"
                    :key="tag"
                    class="rounded-lg border border-slate-100/80 bg-slate-50 px-2.5 py-1 text-[10px] font-bold tracking-wide text-slate-500 transition-colors group-hover:border-indigo-100/30 group-hover:bg-indigo-50/40 group-hover:text-indigo-600"
                >
                    {{ tag.trim() }}
                </span>
            </div>
        </div>

        <!-- Actions Dock: Conditionally mounts links, scaling layout natively based on available data -->
        <div class="flex items-center gap-2 border-t border-slate-100/80 pt-4">
            <!-- 6. GitHub Source Action Button -->
            <a
                v-if="project.github_url"
                :href="project.github_url"
                target="_blank"
                title="View Codebase Source"
                class="flex h-11 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 text-slate-600 transition-all hover:border-indigo-200 hover:bg-slate-50 hover:text-indigo-600"
            >
                <Github class="h-5 w-5" />
            </a>

            <!-- 7. Native Binary Download Button (Shows up if executable exists) -->
            <a
                v-if="project.download_url"
                :href="project.download_url"
                download
                class="flex h-11 flex-1 items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 text-center text-xs font-bold text-white shadow-md transition-all hover:-translate-y-0.5 hover:bg-slate-800"
            >
                <Download class="h-4 w-4" /> Download
            </a>

            <!-- 5. Interactive Web Live Demo Button -->
            <a
                v-if="project.live_url"
                :href="project.live_url"
                target="_blank"
                class="flex h-11 flex-1 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 text-center text-xs font-bold text-white shadow-lg shadow-indigo-100 transition-all hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-indigo-200"
            >
                Live Demo <ExternalLink class="h-4 w-4" />
            </a>
        </div>
    </article>
</template>
