<script setup>
  import { Link } from '@inertiajs/vue3';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
  <div
    id="MainHeader"
    class="fixed z-50 flex items-center w-full h-[56px] bg-white shadow-xl border-b px-4"
  >
    <div class="max-w-7xl flex items-center justify-between w-full mx-auto sm:px-6 lg:px-8">
      <div class="px-3">
        <div>
          <Link href="/">
            <ApplicationLogo class="w-12 h-12 fill-current text-gray-500" />
          </Link>
        </div>
      </div>
      <nav class="bg-white border-b border-gray-100">
        <div class="flex justify-center gap-4">
          <Link
            class="py-2 px-4 border border-gray-100 hover:border-red-500 text-red-500 transition-all rounded-md"
            :class="{ 'border-red-500': $page.component === 'Posts/Index' }"
            href="/posts"
            >Posts
          </Link>
          <Link
            class="py-2 px-4 border border-gray-100 hover:border-red-500 text-red-500 transition-all rounded-md"
            :class="{ 'border-red-500 ': $page.component === 'Articles/Index' }"
            href="/articles"
            >Articles
          </Link>
          <Link
            class="py-2 px-4 border border-gray-100 hover:border-red-500 text-red-500 transition-all rounded-md"
            :class="{ 'border-red-500 ': $page.component === 'Posts/Create' }"
            href="/posts/create"
            >Add post
          </Link>
        </div>
      </nav>
    </div>
  </div>
  <main id="mainContent" class="min-h-[calc(100vh-56px)] py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <!-- Content goes here -->
        <slot />
      </div>
    </div>
  </main>
</template>
