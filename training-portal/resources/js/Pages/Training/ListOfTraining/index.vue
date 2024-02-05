<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted, defineProps } from "vue";

const props = defineProps({
  lists: Array,
});

onMounted(() => {
  console.log("Lists:", props.lists);
});
</script>

<template>
  <Head title="Lists of Trainings" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Lists of Trainings
      </h2>
    </template>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="container px-5">
              <Link
                :href="route('add_list_of_training')"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                >Add</Link
              >
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
              <table
                class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400"
              >
                <thead>
                  <tr>
                    <th class="px-6 py-3">Training Title</th>
                    <th class="px-6 py-3">Date and Time Requested</th>
                    <th class="px-6 py-3">Venue</th>
                    <th class="px-6 py-3">Facilitator</th>
                    <th class="px-6 py-3">Division</th>
                    <th class="px-6 py-3">Date Added</th>
                    <th class="px-6 py-3">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white border-t dark:bg-gray-800 dark:border-gray-700">
                  <tr class="border-b" v-for="list in lists" :key="list.id">
                    <td class="px-6 py-4">
                      {{ list.training_title }}
                    </td>
                    <td class="px-6 py-4">{{ list.datetime }}</td>
                    <td class="px-6 py-4">{{ list.venue }}</td>
                    <td class="px-6 py-4">{{ list.facilitator }}</td>
                    <td class="px-6 py-4">{{ list.division }}</td>
                    <td class="px-6 py-4">{{ list.created_at }}</td>
                    <td class="px-6 py-4">
                      <Link
                        :href="`/list_of_training/${list.id}/edit`"
                        class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                        >Edit</Link
                      >
                      <Link
                        :href="`/list_of_training/${list.id}/delete`"
                        class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 font-medium rounded-lg text-sm px-3 py-2 mt-3 text-center me-2"
                        method="delete"
                        as="button"
                        type="button"
                        >Delete</Link
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
