<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import BlogCard from '@/Components/BlogCard.vue';

defineProps({
    blogs: Array,
});
</script>

<template>
    <AppLayout>
        <!-- Background Gradients (Atmosphere) -->
        <div class="pointer-events-none fixed inset-0 z-0">
            <div class="absolute top-[-10%] left-[-10%] h-[50%] w-[50%] rounded-full bg-indigo-200/40 blur-[120px]"></div>
            <div class="absolute right-[-5%] bottom-[10%] h-[40%] w-[40%] rounded-full bg-violet-200/30 blur-[100px]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 py-20">
            <!-- Header Section -->
            <div class="mx-auto mb-20 max-w-2xl text-center">
                <div class="mb-4 inline-block rounded-full border border-violet-100 bg-violet-50 px-4 py-1.5 text-xs font-bold tracking-widest text-violet-600 uppercase">
                    Knowledge Base
                </div>
                <h1 class="mb-6 text-5xl font-black tracking-tight text-slate-900 sm:text-6xl">
                    Technical Journal.
                </h1>
                <p class="text-base leading-relaxed text-slate-600 sm:text-lg">
                    Documentation of my learning process, software architecture, and the evolution of my code.
                </p>
            </div>

            <!-- Blog Grid -->
            <div v-if="blogs.length > 0" class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <BlogCard 
                    v-for="blog in blogs" 
                    :key="blog.id" 
                    :blog="blog" 
                />
            </div>

            <!-- Empty State -->
            <div v-else class="rounded-3xl border border-dashed border-slate-200 bg-white/40 py-24 text-center backdrop-blur-sm">
                <p class="font-bold text-slate-500">
                    No technical logs documented yet.
                </p>
            </div>
        </div>
    </AppLayout>
</template>