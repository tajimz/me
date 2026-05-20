<script setup>
import ProjectCard from '@/Components/ProjectCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    featured_projects: Array
});
</script>

<template>
  <AppLayout>
    <!-- Background Gradient Blobs -->
    <div class="pointer-events-none fixed inset-0 z-0">
      <div class="absolute top-[-10%] left-[-10%] h-[50%] w-[50%] rounded-full bg-indigo-200/40 blur-[120px]"></div>
      <div class="absolute right-[-5%] bottom-[10%] h-[40%] w-[40%] rounded-full bg-violet-200/30 blur-[100px]"></div>
    </div>

    <div class="relative z-10 mx-auto max-w-6xl px-6">
        
        <!-- HERO SECTION: Grid container ends here -->
        <div class="grid grid-cols-2 items-center gap-16 py-32">
            <!-- Left Column: Copy & Actions -->
            <div>
                <div class="mb-6 inline-block rounded-full border border-indigo-100 bg-indigo-50 px-4 py-1.5 text-xs font-bold tracking-widest text-indigo-600 uppercase">
                Full Stack Programmer
                </div>
                <h1 class="mb-8 text-7xl font-black tracking-tight leading-[1.1]">
                Building robust <br />
                <span class="bg-gradient-to-r from-indigo-600 to-violet-500 bg-clip-text text-transparent"> Android, Web & IoT </span>
                experiences.
                </h1>
                <p class="mb-10 max-w-md text-lg leading-relaxed text-slate-600">
                I’m Tajim, specializing in Laravel, Vue.js, native Android, and Arduino based IoT devices. I turn complex problems into elegant digital solutions.
                </p>
                <div class="flex gap-4">
                <Link href="/blogs" class="rounded-2xl bg-indigo-600 px-8 py-4 font-bold text-white shadow-lg shadow-indigo-200 transition-all hover:-translate-y-1 hover:shadow-indigo-300">
                    Read Blogs
                </Link>
                <Link href="/projects" class="rounded-2xl border border-slate-200 bg-white px-8 py-4 font-bold transition-all hover:bg-slate-50">
                    View Projects
                </Link>
                </div>
            </div>

            <!-- Right Column: Image -->
            <div class="flex justify-center">
                <div class="relative h-[450px] w-[450px]">
                    <div class="absolute -inset-4 rounded-[30%_70%_70%_30%/30%_30%_70%_70%] bg-gradient-to-tr from-indigo-200 to-violet-200 blur-2xl"></div>
                    <div class="relative h-full w-full overflow-hidden rounded-[30%_70%_70%_30%/30%_30%_70%_70%] border-2 border-white bg-slate-200 shadow-2xl transition-all duration-700 hover:rounded-3xl">
                        <img src="/images/me5.png" alt="TR Tajim" class="h-full w-full object-cover object-top transition-transform duration-700 hover:scale-105" />
                    </div>
                    <div class="absolute -right-4 -bottom-4 rounded-2xl bg-white p-4 shadow-xl">
                        <div class="flex gap-2">
                        <span class="text-xs font-bold text-indigo-600">Laravel</span>
                        <span class="text-xs font-bold text-violet-600">Vue.js</span>
                        <span class="text-xs font-bold text-emerald-600">Android</span>
                        <span class="text-xs font-bold text-zinc-600">Arduino</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FEATURED WORK SECTION: Placed outside the hero grid -->
        <section class="py-20 border-t border-slate-200/50">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <h2 class="text-4xl font-black text-slate-900 mb-2">Featured Work</h2>
                    <p class="text-slate-500">A selection of my favorite projects.</p>
                </div>
                <Link href="/projects" class="font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                    View All Projects &rarr;
                </Link>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <ProjectCard 
                    v-for="project in featured_projects" 
                    :key="project.id" 
                    :project="project" 
                />
            </div>
        </section>
        
    </div>
  </AppLayout>
</template>