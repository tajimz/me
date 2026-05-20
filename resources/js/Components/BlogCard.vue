<script setup>
import { Link } from '@inertiajs/vue3';
// Only import lucide icons here if you plan to use them
// import { ArrowRight } from 'lucide-vue-next'; 

defineProps({ 
    blog: Object 
});
</script>

<template>
    <!-- Moved classes inside the tag -->
    <Link 
        :href="`/blogs/${blog.slug}`"
        class="group relative flex h-full flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white transition-all duration-500 hover:border-indigo-300 hover:shadow-2xl hover:shadow-indigo-100"
    >
        <!-- Image -->
        <div class="h-52 overflow-hidden">
            <img
                :src="blog.cover_image"
                :alt="blog.title"
                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
            />
        </div>

        <!-- Main Content Area -->
        <div class="flex flex-grow flex-col p-6">
            <!-- Metadata -->
            <div class="mb-4 flex items-center gap-3">
                <span
                    v-if="blog.is_featured"
                    class="rounded-full bg-amber-100 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-amber-700"
                >
                    Featured
                </span>
                <span class="text-xs font-medium text-gray-400">
                    {{ blog.views }} views
                </span>
            </div>

            <!-- Title & Excerpt -->
            <h3 class="mb-3 text-xl font-bold text-gray-900 transition-colors duration-300 group-hover:text-indigo-600">
                {{ blog.title }}
            </h3>
            <p class="mb-6 line-clamp-3 text-sm leading-relaxed text-gray-500">
                {{ blog.excerpt }}
            </p>

            <!-- Footer -->
            <div class="mt-auto flex items-center justify-between border-t border-gray-50 pt-4">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Read Article</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-50 transition-colors duration-300 group-hover:bg-indigo-600 group-hover:text-white">
                    <span class="text-lg">→</span>
                </div>
            </div>
        </div>
    </Link>
</template>