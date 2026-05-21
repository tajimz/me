<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
    title: '',
    content: '',
    cover_image: null,
    is_featured: false,
});

const submit = () => {
    form.post('/admin/blogs', {
        onSuccess: () => alert('Blog post created!'),
        onError: (errors) => {
            alert(Object.values(errors)[0]);
        },
    });
};
</script>

<template>
    <AdminLayout>
        <header class="mb-12">
            <h1 class="text-4xl font-black tracking-tighter text-slate-900">
                New Blog Post
            </h1>
            <p
                class="mt-2 text-[10px] font-black tracking-[0.2em] text-slate-400 uppercase"
            >
                Share your thoughts and reviews.
            </p>
        </header>

        <form
            @submit.prevent="submit"
            class="grid grid-cols-1 gap-8 lg:grid-cols-3"
        >
            <!-- Left: Main Content (2/3 width) -->
            <div class="space-y-6 lg:col-span-2">
                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-2 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Title</label
                    >
                    <input
                        v-model="form.title"
                        type="text"
                        class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900 focus:border-indigo-600 focus:ring-0"
                        placeholder="A catchy title..."
                    />
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-2 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Content</label
                    >
                    <textarea
                        v-model="form.content"
                        rows="12"
                        class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900 focus:border-indigo-600 focus:ring-0"
                        placeholder="Write your post here..."
                    ></textarea>
                </div>
            </div>

            <!-- Right: Meta & Actions (1/3 width) -->
            <div class="space-y-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-4 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Cover Image</label
                    >
                    <input
                        type="file"
                        @input="form.cover_image = $event.target.files[0]"
                        class="w-full text-[10px] font-bold text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-slate-100 file:px-4 file:py-2 file:font-black file:text-slate-600 file:uppercase hover:file:bg-indigo-50"
                    />
                </div>

                <div
                    class="flex items-center justify-between rounded-3xl border border-slate-200 bg-white p-8"
                >
                    <label
                        class="text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Is Featured?</label
                    >
                    <button
                        type="button"
                        @click="form.is_featured = !form.is_featured"
                        :class="[
                            'h-6 w-12 rounded-full transition-colors',
                            form.is_featured ? 'bg-indigo-600' : 'bg-slate-200',
                        ]"
                    >
                        <div
                            :class="[
                                'ml-1 h-4 w-4 rounded-full bg-white transition-transform',
                                form.is_featured
                                    ? 'translate-x-6'
                                    : 'translate-x-0',
                            ]"
                        ></div>
                    </button>
                </div>

                <div class="pt-4">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full rounded-xl bg-slate-900 py-4 text-[10px] font-black tracking-widest text-white uppercase shadow-lg shadow-indigo-600/20 transition-all hover:bg-indigo-600"
                    >
                        {{ form.processing ? 'Saving...' : 'Publish Blog' }}
                    </button>
                    <Link
                        href="/admin/blogs"
                        class="mt-4 block text-center text-[10px] font-black tracking-widest text-slate-400 uppercase hover:text-slate-900"
                        >Cancel</Link
                    >
                </div>
            </div>
        </form>
    </AdminLayout>
</template>
