<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({ blog: Object });

const form = useForm({
    _method: 'PUT', // Required for file uploads in updates
    title: props.blog.title,
    slug: props.blog.slug,
    content: props.blog.content,
    cover_image: null,
    views: props.blog.views,
    is_featured: !!props.blog.is_featured,
    is_published: !!props.blog.is_published,
});

const submit = () => {
    form.post(`/admin/blogs/${props.blog.id}`, {
        forceFormData: true,
        onSuccess: () => alert('Blog updated!'),
        onError: (errors) => alert(Object.values(errors)[0]),
    });
};
</script>

<template>
    <AdminLayout>
        <header class="mb-12">
            <h1 class="text-4xl font-black tracking-tighter text-slate-900">
                Edit Blog
            </h1>
            <p
                class="mt-2 text-[10px] font-black tracking-[0.2em] text-slate-400 uppercase"
            >
                Editing: {{ blog.title }}
            </p>
        </header>

        <form
            @submit.prevent="submit"
            class="grid grid-cols-1 gap-8 pb-20 lg:grid-cols-3"
        >
            <!-- Left: Main Fields -->
            <div class="space-y-6 lg:col-span-2">
                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-2 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Title</label
                    >
                    <input
                        v-model="form.title"
                        type="text"
                        class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900"
                    />
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-2 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Slug URL</label
                    >
                    <div
                        class="flex items-center overflow-hidden rounded-xl border border-slate-200 bg-slate-50"
                    >
                        <!-- Visual Prefix -->
                        <span
                            class="border-r border-slate-200 bg-slate-100 px-4 py-4 text-[10px] font-black tracking-widest whitespace-nowrap text-slate-400 uppercase"
                        >
                            domain.com/blogs/
                        </span>
                        <!-- Editable Slug -->
                        <input
                            v-model="form.slug"
                            type="text"
                            class="w-full border-0 bg-transparent p-4 font-bold text-slate-900 focus:ring-0"
                            placeholder="my-blog-post"
                        />
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-2 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Content</label
                    >
                    <textarea
                        v-model="form.content"
                        rows="12"
                        class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900"
                    ></textarea>
                </div>
            </div>

            <!-- Right: Meta & Toggles -->
            <div class="space-y-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-4 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Cover Image</label
                    >
                    <input
                        type="file"
                        @input="form.cover_image = $event.target.files[0]"
                        class="w-full text-[10px] text-slate-500 file:mr-4 file:rounded-xl file:bg-slate-100 file:px-4 file:py-2 file:font-black file:uppercase"
                    />
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-8">
                    <label
                        class="mb-2 block text-[9px] font-black tracking-widest text-slate-400 uppercase"
                        >Views</label
                    >
                    <input
                        v-model="form.views"
                        type="number"
                        class="w-full rounded-xl border border-slate-200 p-4 font-bold text-slate-900"
                    />
                </div>

                <!-- Toggles -->
                <div class="space-y-4">
                    <div
                        class="flex items-center justify-between rounded-3xl border border-slate-200 bg-white p-6"
                    >
                        <label
                            class="text-[9px] font-black tracking-widest text-slate-400 uppercase"
                            >Featured?</label
                        >
                        <button
                            type="button"
                            @click="form.is_featured = !form.is_featured"
                            :class="[
                                'h-6 w-12 rounded-full transition-colors',
                                form.is_featured
                                    ? 'bg-indigo-600'
                                    : 'bg-slate-200',
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

                    <div
                        class="flex items-center justify-between rounded-3xl border border-slate-200 bg-white p-6"
                    >
                        <label
                            class="text-[9px] font-black tracking-widest text-slate-400 uppercase"
                            >Published?</label
                        >
                        <button
                            type="button"
                            @click="form.is_published = !form.is_published"
                            :class="[
                                'h-6 w-12 rounded-full transition-colors',
                                form.is_published
                                    ? 'bg-indigo-600'
                                    : 'bg-slate-200',
                            ]"
                        >
                            <div
                                :class="[
                                    'ml-1 h-4 w-4 rounded-full bg-white transition-transform',
                                    form.is_published
                                        ? 'translate-x-6'
                                        : 'translate-x-0',
                                ]"
                            ></div>
                        </button>
                    </div>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full rounded-xl bg-slate-900 py-4 text-[10px] font-black tracking-widest text-white uppercase transition-all hover:bg-indigo-600"
                >
                    {{ form.processing ? 'Updating...' : 'Update Blog' }}
                </button>
                <Link
                    href="/admin/blogs"
                    class="block text-center text-[10px] font-black tracking-widest text-slate-400 uppercase hover:text-slate-900"
                    >Cancel</Link
                >
            </div>
        </form>
    </AdminLayout>
</template>
