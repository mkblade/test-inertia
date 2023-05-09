<script setup>
  import { Link } from '@inertiajs/vue3';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
  <div
    id="MainHeader"
    class="fixed z-50 top-0 flex items-center w-full h-[56px] bg-white shadow-xl border-b px-4"
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
            :class="{ 'border-red-500 ': $page.component === 'Article/Index' }"
            href="/articles"
            >Articles
          </Link>
          <Link
            class="py-2 px-4 border border-gray-100 hover:border-red-500 text-red-500 transition-all rounded-md"
            :class="{ 'border-red-500 ': $page.component === 'Article/Create' }"
            href="/articles/create"
            >New Article
          </Link>
        </div>
      </nav>
    </div>
  </div>
  <main id="mainContent" class="min-h-[calc(100vh-56px)] py-6 mt-14">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden sm:rounded-lg">
        <div v-if="$page.props.flash.message" class="bg-indigo-400 text-white p-4 mx-6 text-center">
          {{ $page.props.flash.message }}
        </div>
        <!-- Content goes here -->
        <slot />
      </div>
    </div>
  </main>
</template>
