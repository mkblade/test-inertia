<script setup>
  import { Head, Link, router } from '@inertiajs/vue3';
  import AppLayout from '@/Layouts/AppLayout.vue';
  import Edit from 'vue-material-design-icons/Pencil.vue';
  import Delete from 'vue-material-design-icons/Delete.vue';
  import { ref } from 'vue';
  import Modal from '@/Components/Modal.vue';
  import DangerButton from '@/Components/DangerButton.vue';
  import SecondaryButton from '@/Components/SecondaryButton.vue';
  import Pagination from "@/Components/Pagination.vue";

  defineProps({
    articles: Object,
  });

  const showConfirmationModal = ref(false);
  const selectedArticle = ref(null);

  const confirmDeleteArticle = (article) => {
    selectedArticle.value = article;
    showConfirmationModal.value = true;
  };

  const closeModal = () => {
    showConfirmationModal.value = false;
    selectedArticle.value = null;
  };

  const destroy = (id) =>
    router.delete('/articles/' + id, {
      onFinish: () => closeModal(),
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
                  >Actions</span
                >
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <tr v-for="article in articles.data" class="hover:bg-gray-100">
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
                <div class="flex gap-2">
                  <Link
                    :href="`/articles/${article.id}/edit`"
                    class="hover:bg-gray-200 rounded-full p-2"
                  >
                    <Edit :size="28" fill-color="#F4CA16" />
                  </Link>
                  <button
                    @click="confirmDeleteArticle(article)"
                    type="button"
                    class="hover:bg-gray-200 rounded-full p-2"
                  >
                    <Delete :size="28" fill-color="#EB4C42" />
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

        <Pagination :links="articles.meta.links || []" />

        <Modal :show="showConfirmationModal" @close="closeModal">
          <div class="p-6">
            <div class="text-lg font-semibold text-gray-800">
              Do you really want to delete article "{{ selectedArticle.title }}"?
            </div>
            <div class="mt-6 flex justify-center space-x-4">
              <DangerButton @click="destroy(selectedArticle.id)">Delete</DangerButton>
              <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
            </div>
          </div>
        </Modal>
      </div>
    </div>
  </AppLayout>
</template>
