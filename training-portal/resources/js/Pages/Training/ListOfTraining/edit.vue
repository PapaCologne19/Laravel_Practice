<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
  list: Object,
});

const form = useForm({
  training_title: props.list,
  datetime: "",
  venue: "",
  facilitator: "",
  division: "",
});

const submit = () => {
  form.post(route("store_list_of_training"));
};
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Lists of Trainings
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="container px-5">
              <Link
                :href="route('list-of-training')"
                class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                >Back</Link
              >
            </div>
            <div class="container mt-9">
              <form @submit.prevent="submit">
                <div>
                  <InputLabel for="training_title" value="Training Title" />
                  <TextInput
                    id="training_title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.training_title"
                    required
                    autofocus
                    autocomplete="training_title"
                  />
                </div>

                <div class="mt-4">
                  <InputLabel for="datetime" value="Date and Time" />
                  <TextInput
                    id="datetime"
                    type="datetime-local"
                    class="mt-1 block w-full"
                    v-model="form.datetime"
                    required
                    autofocus
                    autocomplete="datetime"
                  />
                </div>

                <div class="mt-4">
                  <InputLabel for="venue" value="Venue" />
                  <TextInput
                    id="venue"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.venue"
                    required
                    autofocus
                    autocomplete="venue"
                  />
                </div>

                <div class="mt-4">
                  <InputLabel for="facilitator" value="Facilitator" />
                  <TextInput
                    id="facilitator"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.facilitator"
                    required
                    autofocus
                    autocomplete="facilitator"
                  />
                </div>

                <div class="mt-4">
                  <InputLabel for="division" value="Division" />
                  <TextInput
                    id="division"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.division"
                    required
                    autofocus
                    autocomplete="division"
                  />
                </div>

                <div class="flex items-center justify-center mt-4">
                  <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                  >
                    Update
                  </PrimaryButton>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
