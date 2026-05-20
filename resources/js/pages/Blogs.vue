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
            <div
                class="absolute top-[-10%] left-[-10%] h-[50%] w-[50%] rounded-full bg-indigo-200/40 blur-[120px]"
            ></div>
            <div
                class="absolute right-[-5%] bottom-[10%] h-[40%] w-[40%] rounded-full bg-violet-200/30 blur-[100px]"
            ></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 py-12 md:py-20">
            <!-- Header Section -->
            <div class="mx-auto mb-12 max-w-2xl text-center md:mb-20">
                <div
                    class="mb-4 inline-block rounded-full border border-violet-100 bg-violet-50 px-4 py-1.5 text-xs font-bold tracking-widest text-violet-600 uppercase"
                >
                    Random Thoughts
                </div>
                <h1
                    class="mb-6 text-4xl font-black tracking-tight text-slate-900 sm:text-5xl md:text-6xl"
                >
                    Stories & Reviews
                </h1>
                <p
                    class="px-2 text-base leading-relaxed text-slate-600 md:text-lg"
                >
                    Books, projects, and whatever else is on my mind. I'm just
                    here to share what I've learned and what I've read.
                </p>
            </div>

            <!-- Blog Grid -->
            <div
                v-if="blogs.length > 0"
                class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3"
            >
                <BlogCard v-for="blog in blogs" :key="blog.id" :blog="blog" />
            </div>

            <!-- Empty State -->
            <div
                v-else
                class="mx-6 rounded-3xl border border-dashed border-slate-200 bg-white/40 py-16 text-center backdrop-blur-sm md:py-24"
            >
                <p class="font-bold text-slate-500">
                    No technical logs documented yet.
                </p>
            </div>
        </div>
    </AppLayout>
</template>
