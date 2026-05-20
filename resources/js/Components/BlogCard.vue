<template>
  <!-- Added flex flex-col to the card -->
  <div class="group relative bg-white rounded-2xl border border-gray-200 overflow-hidden transition-all duration-500 hover:border-indigo-300 hover:shadow-2xl hover:shadow-indigo-100 flex flex-col h-full">
    
    <!-- Image -->
    <div class="overflow-hidden h-52">
      <img 
        :src="blog.cover_image" 
        :alt="blog.title" 
        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
      >
    </div>

    <!-- Main Content Area: Use flex-grow to push footer down -->
    <div class="p-6 flex flex-col flex-grow">
      
      <!-- Metadata -->
      <div class="flex items-center gap-3 mb-4">
        <span v-if="blog.is_featured" class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] uppercase tracking-widest font-bold rounded-full">
          Featured
        </span>
        <span class="text-xs text-gray-400 font-medium">
          {{ blog.views }} views
        </span>
      </div>

      <!-- Title & Excerpt -->
      <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
        {{ blog.title }}
      </h3>
      <p class="text-gray-500 text-sm mb-6 leading-relaxed line-clamp-3">
        {{ blog.excerpt }}
      </p>

      <!-- Footer: This is pushed to the bottom by the flex-grow above -->
      <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-50">
        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Read Article</span>
        <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
          <span class="text-lg">→</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({ blog: Object });
</script>