<script setup>
import BlogCard from '@/Components/BlogCard.vue';
import ProjectCard from '@/Components/ProjectCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    featured_projects: Array,
    featured_blogs: Array,
});
</script>

<template>
    <AppLayout>
        <!-- Background Gradient Blobs -->
        <div class="pointer-events-none fixed inset-0 z-0">
            <div
                class="absolute top-[-10%] left-[-10%] h-[50%] w-[50%] rounded-full bg-indigo-200/40 blur-[120px]"
            ></div>
            <div
                class="absolute right-[-5%] bottom-[10%] h-[40%] w-[40%] rounded-full bg-violet-200/30 blur-[100px]"
            ></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <!-- HERO SECTION: Mobile first approach -->
            <div
                class="grid grid-cols-1 items-center gap-12 py-16 md:grid-cols-2 md:py-32 lg:gap-16"
            >
                <!-- Left Column: Copy & Actions -->
                <div class="order-2 text-center md:order-1 md:text-left">
                    <div
                        class="mb-6 inline-block rounded-full border border-indigo-100 bg-indigo-50 px-4 py-1.5 text-xs font-bold tracking-widest text-indigo-600 uppercase"
                    >
                        Still Learning
                    </div>
                    <h1
                        class="mb-8 text-5xl leading-[1.1] font-black tracking-tight md:text-7xl"
                    >
                        Building robust <br />
                        <span
                            class="bg-gradient-to-r from-indigo-600 to-violet-500 bg-clip-text text-transparent"
                        >
                            Android, Web & IoT
                        </span>
                        experiences.
                    </h1>
                    <p
                        class="mx-auto mb-10 max-w-md text-lg leading-relaxed text-slate-600 md:mx-0"
                    >
                        Hi, I’m Tajim. I love building things with code. Whether
                        it’s web development, Android apps, or tinkering with
                        Arduino hardware, I’m always working on something new.
                    </p>
                    <div
                        class="flex flex-col justify-center gap-4 sm:flex-row md:justify-start"
                    >
                        <!-- Primary Button -->
                        <!-- Primary "Sticker" Button -->
                        <Link
                            href="/blogs"
                            class="relative rounded-2xl bg-indigo-600 px-8 py-4 font-bold text-white shadow-lg shadow-indigo-200 transition-all hover:scale-105 hover:-rotate-2 active:scale-95"
                        >
                            Read Blogs
                        </Link>

                        <!-- Secondary "Draft" Button -->
                        <Link
                            href="/projects"
                            class="relative rounded-2xl border-2 border-dashed border-slate-400 bg-slate-50 px-8 py-4 font-bold text-slate-700 transition-all hover:scale-105 hover:rotate-2 hover:border-slate-600 active:scale-95"
                        >
                            View Projects
                        </Link>
                    </div>
                </div>

                <!-- Right Column: Image -->
                <div class="order-1 flex justify-center md:order-2">
                    <div
                        class="relative h-[300px] w-[300px] md:h-[450px] md:w-[450px]"
                    >
                        <div
                            class="absolute -inset-4 rounded-[30%_70%_70%_30%/30%_30%_70%_70%] bg-gradient-to-tr from-indigo-200 to-violet-200 blur-2xl"
                        ></div>
                        <div
                            class="relative h-full w-full overflow-hidden rounded-[30%_70%_70%_30%/30%_30%_70%_70%] border-2 border-white bg-slate-200 shadow-2xl transition-all duration-700 hover:rounded-3xl"
                        >
                            <img
                                src="/images/me5.png"
                                alt="TR Tajim"
                                class="h-full w-full object-cover object-top transition-transform duration-700 hover:scale-105"
                            />
                        </div>
                        <!-- Tag cloud hidden on very small screens if it gets too crowded, or kept visible -->
                        <div
                            class="absolute -right-2 -bottom-2 rounded-xl bg-white p-2 shadow-xl md:-right-4 md:-bottom-4 md:rounded-2xl md:p-4"
                        >
                            <div class="flex gap-2 text-[10px] md:text-xs">
                                <span class="font-bold text-indigo-600"
                                    >Laravel</span
                                >
                                <span class="font-bold text-violet-600"
                                    >Vue.js</span
                                >
                                <span class="font-bold text-emerald-600"
                                    >Android</span
                                >
                                <span class="font-bold text-zinc-600"
                                    >Arduino</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FEATURED WORK SECTION -->
            <section class="border-t border-slate-200/50 py-12 md:py-20">
                <div
                    class="mb-6 flex flex-col items-start justify-between gap-4 md:flex-row md:items-end"
                >
                    <div>
                        <h2
                            class="mb-2 text-3xl font-black text-slate-900 md:text-4xl"
                        >
                            Featured Work
                        </h2>
                        <p class="text-slate-500">
                            A selection of my favorite projects.
                        </p>
                    </div>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <ProjectCard
                        v-for="project in featured_projects"
                        :key="project.id"
                        :project="project"
                    />
                </div>
                <div class="mt-12 flex justify-center">
                    <Link
                        href="/projects"
                        class="font-bold text-indigo-600 transition-colors hover:text-indigo-800"
                    >
                        View All Projects &rarr;
                    </Link>
                </div>
            </section>

            <!-- FEATURED BLOGS SECTION -->
            <section class="border-t border-slate-200/50 py-12 md:py-20">
                <div
                    class="mb-6 flex flex-col items-start justify-between gap-4 md:flex-row md:items-end"
                >
                    <div>
                        <h2
                            class="mb-2 text-3xl font-black text-slate-900 md:text-4xl"
                        >
                            Notes & Reviews
                        </h2>
                        <p class="text-slate-500">
                            Books I’m reading and thoughts I’m keeping.
                        </p>
                    </div>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <BlogCard
                        v-for="blog in featured_blogs"
                        :key="blog.id"
                        :blog="blog"
                    />
                </div>
                <div class="mt-12 flex justify-center">
                    <Link
                        href="/blogs"
                        class="font-bold text-indigo-600 transition-colors hover:text-indigo-800"
                    >
                        View All Blogs &rarr;
                    </Link>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
