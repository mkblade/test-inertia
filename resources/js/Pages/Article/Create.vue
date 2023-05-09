<script setup>
  import { Head, useForm, Link } from '@inertiajs/vue3';
  import AppLayout from '@/Layouts/AppLayout.vue';
  import TextInput from '@/Components/TextInput.vue';

  const form = useForm({
    title: '',
    content: '',
  });

  defineProps({
    errors: Object,
  });
</script>

<template>
  <Head title="Update Article" />

  <AppLayout>
    <div class="my-3 px-6">
      <h1 class="text-2xl">Create new article</h1>
    </div>
    <form @submit.prevent="form.post('/articles')" class="p-6 max-w-4xl">
      <div>
        <TextInput v-model="form.title" type="text" placeholder="Title" />
        <div v-if="errors.title" class="text-red-600">
          {{ errors.title }}
        </div>
      </div>

      <div class="mt-4">
        <textarea
          v-model="form.content"
          placeholder="Article text here"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        ></textarea>
        <div v-if="errors.content" class="text-red-600">
          {{ errors.content }}
        </div>
      </div>

      <div class="py-4">
        <button
          type="submit"
          :disabled="form.processing"
          class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded"
        >
          Save article
        </button>
        <Link href="/articles" class="ml-2 inline-block px-4 py-3 bg-gray-100 rounded">
          Cancel
        </Link>
      </div>
    </form>
  </AppLayout>
</template>
