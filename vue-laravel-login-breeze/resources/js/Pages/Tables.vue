<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Tables" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tables</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">You're logged ins!</div>
          <Link href="dashboard" class="ml-4">Dashboard</Link>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
