<script setup>
import {
    ArrowLeft,
    Calendar,
    Eye,
    Share2,
    Facebook,
    Copy,
} from 'lucide-vue-next';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    blog: {
        type: Object,
        required: true,
    },
});

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <AppLayout>
        <!-- Background Blobs (Consistent with Home Page) -->
        <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
            <div
                class="absolute top-[-10%] left-[-10%] h-[50%] w-[50%] rounded-full bg-indigo-50/50 blur-[120px]"
            ></div>
            <div
                class="absolute right-[-5%] bottom-[10%] h-[40%] w-[40%] rounded-full bg-violet-50/50 blur-[100px]"
            ></div>
        </div>

        <div class="relative z-10 mx-auto max-w-4xl px-6 py-20">
            <!-- Back Button -->
            <button
                @click="goBack"
                href="/blogs"
                class="group mb-12 flex items-center text-sm font-bold text-slate-500 transition-colors hover:text-indigo-600"
            >
                <div
                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-full border border-slate-200 bg-white transition-transform group-hover:-translate-x-1"
                >
                    <ArrowLeft class="h-4 w-4" />
                </div>
                Back
            </button>

            <!-- Header -->
            <header class="mb-12">
                <span
                    class="mb-4 inline-block rounded-full bg-indigo-50 px-4 py-1 text-xs font-black tracking-widest text-indigo-600 uppercase"
                >
                    Featured Article
                </span>
                <h1
                    class="mb-8 text-5xl leading-[1.1] font-black tracking-tight text-slate-900 md:text-6xl"
                >
                    {{ blog.title }}
                </h1>

                <div
                    class="flex items-center gap-8 border-y border-slate-200 py-6 text-sm font-bold text-slate-500"
                >
                    <div class="flex items-center gap-2">
                        <Calendar class="h-5 w-5 text-indigo-500" />
                        <span>{{
                            new Date(blog.created_at).toLocaleDateString()
                        }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <Eye class="h-5 w-5 text-violet-500" />
                        <span>{{ blog.views }} total views</span>
                    </div>
                </div>
            </header>

            <!-- Hero Image with "Blob" styling -->
            <div
                class="mb-16 overflow-hidden rounded-[2rem] border-4 border-white shadow-2xl"
            >
                <img
                    :src="blog.cover_image"
                    :alt="blog.title"
                    class="h-[450px] w-full object-cover transition-transform duration-700 hover:scale-105"
                />
            </div>

            <!-- Content -->
            <article
                class="prose prose-lg prose-indigo prose-headings:font-black prose-a:text-indigo-600 max-w-none"
            >
                <div v-html="blog.content"></div>
            </article>

            <!-- Footer Share Section -->
            <footer
                class="mt-20 rounded-3xl border border-indigo-100 bg-white/50 p-8 shadow-sm backdrop-blur-sm"
            >
                <div
                    class="flex flex-col items-center justify-between gap-6 sm:flex-row"
                >
                    <div class="text-center sm:text-left">
                        <h4 class="font-black text-slate-900">
                            Enjoyed this article?
                        </h4>
                        <p class="text-sm text-slate-500">
                            Share it with your network!
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <a
                            :href="`https://www.facebook.com/sharer/sharer.php?u=https://tajimz.xyz/blogs/${blog.slug}`"
                            target="_blank"
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-900 text-white transition hover:scale-105 hover:bg-indigo-600"
                            ><Facebook class="h-5 w-5"
                        /></a>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-600 transition hover:scale-105"
                        >
                            <Copy class="h-5 w-5" />
                        </button>
                    </div>
                </div>
            </footer>
        </div>
    </AppLayout>
</template>
