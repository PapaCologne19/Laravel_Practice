<script setup>
import NavBar from "@/Layouts/NavBar.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  add: Object,
});

const form = useForm({
  training_title: props.add.training_title,
  datetime: props.add.datetime,
  venue: props.add.venue,
  facilitator: props.add.facilitator,
  division: props.add.division,
});

const submit = () => {
  form.post(route("store_user_training_list"));
};
</script>
<template>
  <NavBar>
    <Head title="Add" />
    <div class="container mx-auto flex flex-col items-center mt-9">
      <div class="container">
        <Link
          :href="route('show_user_training_list')"
          class="text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
          >Back</Link
        >
      </div>
      <form @submit.prevent="submit">
        <div>
          <InputLabel for="training_title" value="Training Title" />
          <TextInput
            id="training_title"
            type="text"
            class="mt-1 block w-96"
            v-model="form.training_title"
            required
            readonly
            autofocus
            autocomplete="training_title"
          />
        </div>

        <div>
          <InputLabel for="datetime" value="Date and Time" />
          <TextInput
            id="datetime"
            type="datetime-local"
            class="mt-1 block w-96"
            v-model="form.datetime"
            required
            readonly
            autofocus
            autocomplete="datetime"
          />
        </div>

        <div>
          <InputLabel for="venue" value="Venue" />
          <TextInput
            id="venue"
            type="text"
            class="mt-1 block w-96"
            v-model="form.venue"
            required
            readonly
            autofocus
            autocomplete="venue"
          />
        </div>

        <div>
          <InputLabel for="facilitator" value="Facilitator" />
          <TextInput
            id="facilitator"
            type="text"
            class="mt-1 block w-96"
            v-model="form.facilitator"
            required
            autofocus
            autocomplete="facilitator"
          />
        </div>

        <div>
          <InputLabel for="division" value="Division" />
          <TextInput
            id="division"
            type="text"
            class="mt-1 block w-96"
            v-model="form.division"
            required
            autofocus
            autocomplete="division"
          />
        </div>

        <div class="flex items-center justify-center mt-4">
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            class="ms-4"
          >
            Request
          </PrimaryButton>
        </div>
      </form>
    </div>
  </NavBar>
</template>
