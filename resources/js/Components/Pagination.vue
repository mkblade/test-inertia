<script setup>
  import { Link } from '@inertiajs/vue3';

  defineProps({
    links: {
      type: Array,
      default: [],
    },
  });
</script>

<template>
  <div v-if="links.length > 3" class="flex justify-center my-4 space-x-2">
    <template v-for="link in links" :key="link.url">
      <span
        v-if="link.active"
        v-html="link.label"
        class="relative block rounded bg-transparent px-4 py-2 text-md text-neutral transition-all duration-200 hover:text-white hover:bg-indigo-500"
        :class="{ 'bg-indigo-500 text-white': link.active }"
      />
      <Link
        v-else-if="link.url"
        preserve-scroll
        class="relative block rounded bg-transparent px-4 py-2 text-md text-neutral transition-all duration-200 hover:text-white hover:bg-indigo-500"
        :href="link.url"
        v-html="link.label"
      />
    </template>
  </div>
</template>
