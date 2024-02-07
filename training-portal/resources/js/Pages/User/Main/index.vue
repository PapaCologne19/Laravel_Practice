<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavBar from "@/Layouts/NavBar.vue";
import { defineProps } from "vue";

const props = defineProps({
  lists: Array,
});
</script>

<template>
  <NavBar>
    <Head title="Home" />
    <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <Link
        :href="route('add_user_training_list', [list.id])"
        v-for="list in lists"
        :key="list.id"
      >
        <div
          class="max-w-sm p-9 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 mx-2"
        >
          <svg
            class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"
            />
          </svg>

          <h5
            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
          >
            {{ list.training_title }}
          </h5>
          <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
            {{ list.datetime }}
          </p>
          <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
            {{ list.venue }}
          </p>
        </div>
      </Link>
    </div>
  </NavBar>
</template>
