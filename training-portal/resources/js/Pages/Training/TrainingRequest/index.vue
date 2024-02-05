<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted, defineProps } from "vue";

const props = defineProps({
  requests: Array,
});
</script>

<template>
  <Head title="Training Requests" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Training Requests</h2>
    </template>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
              <table
                class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400"
              >
                <thead>
                  <tr>
                    <th class="px-6 py-3">Training Title</th>
                    <th class="px-6 py-3">Date and Time Requested</th>
                    <th class="px-6 py-3">Requestor</th>
                    <th class="px-6 py-3">Venue</th>
                    <th class="px-6 py-3">Facilitator</th>
                    <th class="px-6 py-3">Division</th>
                    <th class="px-6 py-3">Request Status</th>
                    <th class="px-6 py-3">Training Status</th>
                    <th class="px-6 py-3">Date Added</th>
                    <th class="px-6 py-3">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white border-t dark:bg-gray-800 dark:border-gray-700">
                  <tr class="border-b" v-for="request in requests" :key="request.id">
                    <td class="px-6 py-4">
                      {{ request.training_title }}
                    </td>
                    <td class="px-6 py-4">{{ request.datetime }}</td>
                    <td class="px-6 py-4">
                      {{
                        request.firstname +
                        " " +
                        request.middlename +
                        " " +
                        request.lastname
                      }}
                    </td>
                    <td class="px-6 py-4">{{ request.venue }}</td>
                    <td class="px-6 py-4">{{ request.facilitator }}</td>
                    <td class="px-6 py-4">{{ request.division }}</td>
                    <td class="px-6 py-4">{{ request.is_approve }}</td>
                    <td class="px-6 py-4">{{ request.is_done }}</td>
                    <td class="px-6 py-4">{{ request.created_at }}</td>
                    <td class="px-6 py-4">
                      <Link
                        :href="`/request_of_training/${request.id}/edit`"
                        class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2"
                        >Accept</Link
                      >
                      <Link
                        :href="`/request_of_training/${request.id}/delete`"
                        class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 font-medium rounded-lg text-sm px-3 py-2 mt-3 text-center me-2"
                        method="delete"
                        as="button"
                        type="button"
                        >Reject</Link
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
