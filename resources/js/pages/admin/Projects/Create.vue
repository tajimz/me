<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
    name: '',
    details: '',
    cover_image: null,
    type: 'web', // 'web' or 'app'
    github_url: '',
    live_url: '',
    download_url: '',
    is_featured: false,
    tags: '',
});

const submit = () => {
    form.post('/admin/projects', {
        forceFormData: true,
        onSuccess: () => {
            alert('Project created successfully!');
            form.reset();
        },
        onError: (errors) => alert(Object.values(errors)[0]),
    });
};
</script>

<template>
    <AdminLayout>
        <header class="mb-12">
            <h1 class="text-4xl font-black tracking-tighter text-slate-900">New Project</h1>
            <p class="mt-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                Showcase your development work.
            </p>
        </header>

        <form @submit.prevent="submit" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Content -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-3xl border border-slate-200">
                    <label class="block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">Project Name</label>
                    <input v-model="form.name" type="text" class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900 focus:border-indigo-600 focus:ring-0" placeholder="Project title..." />
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200">
                    <label class="block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">Details</label>
                    <textarea v-model="form.details" rows="8" class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900 focus:border-indigo-600 focus:ring-0" placeholder="Project description..."></textarea>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200">
                    <label class="block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">Tags (Comma Separated)</label>
                    <input v-model="form.tags" type="text" class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900 focus:border-indigo-600 focus:ring-0" placeholder="e.g. Vue, Laravel, Firebase" />
                </div>
            </div>

            <!-- Right Column: Meta & Links -->
            <div class="space-y-6">
                <div class="bg-white p-8 rounded-3xl border border-slate-200">
                    <label class="block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-4">Cover Image</label>
                    <input type="file" @input="form.cover_image = $event.target.files[0]" class="w-full text-[10px] font-bold text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-slate-100 file:font-black file:uppercase hover:file:bg-indigo-50" />
                </div>

                <!-- Type Toggle -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 flex items-center justify-between">
                    <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Type</label>
                    <div class="flex gap-2 bg-slate-100 p-1 rounded-xl">
                        <button type="button" @click="form.type = 'web'" :class="['px-4 py-2 rounded-lg text-[9px] font-black uppercase transition-all', form.type === 'web' ? 'bg-white shadow-sm' : 'text-slate-400']">Web</button>
                        <button type="button" @click="form.type = 'app'" :class="['px-4 py-2 rounded-lg text-[9px] font-black uppercase transition-all', form.type === 'app' ? 'bg-white shadow-sm' : 'text-slate-400']">App</button>
                    </div>
                </div>

                <!-- URL Inputs -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 space-y-4">
                    <input v-model="form.github_url" type="text" class="w-full rounded-xl border border-slate-200 p-3 text-[10px] font-bold" placeholder="GitHub URL" />
                    <input v-model="form.live_url" type="text" class="w-full rounded-xl border border-slate-200 p-3 text-[10px] font-bold" placeholder="Live URL" />
                    <input v-model="form.download_url" type="text" class="w-full rounded-xl border border-slate-200 p-3 text-[10px] font-bold" placeholder="Download URL" />
                </div>

                <!-- Featured Toggle -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 flex items-center justify-between">
                    <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Is Featured?</label>
                    <button type="button" @click="form.is_featured = !form.is_featured" :class="['w-12 h-6 rounded-full transition-colors', form.is_featured ? 'bg-indigo-600' : 'bg-slate-200']">
                        <div :class="['w-4 h-4 bg-white rounded-full transition-transform ml-1', form.is_featured ? 'translate-x-6' : 'translate-x-0']"></div>
                    </button>
                </div>

                <button type="submit" :disabled="form.processing" class="w-full bg-slate-900 py-4 rounded-xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-indigo-600 transition-all">
                    {{ form.processing ? 'Saving...' : 'Publish Project' }}
                </button>
            </div>
        </form>
    </AdminLayout>
</template>