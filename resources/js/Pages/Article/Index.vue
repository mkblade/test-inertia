<script setup>
  import { Head } from '@inertiajs/vue3';
  import AppLayout from '@/Layouts/AppLayout.vue';

  defineProps({
    articles: Object,
  });
</script>

<template>
  <Head title="Latest articles" />

  <AppLayout>
    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
      <div class="min-w-full align-middle">
        <table class="min-w-full divide-y divide-gray-200 border">
          <thead>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left">
                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                  >ID</span
                >
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left">
                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                  >Title</span
                >
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left">
                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                  >Content</span
                >
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left">
                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                >Author</span
                >
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left">
                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                  >Created at</span
                >
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <tr v-for="article in articles" class="hover:bg-gray-100">
              <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                {{ article.id }}
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                {{ article.title }}
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                {{ article.content }}
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                {{ article.user.name }}
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                {{ article.created_at }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
