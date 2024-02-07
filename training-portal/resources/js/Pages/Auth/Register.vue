<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  username: "",
  password: "",
  password_confirmation: "",
  firstname: "",
  middlename: "",
  lastname: "",
  email: "",
  division: "",
  id_number: "",
  principal: "",
  supervisor: "",
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Register" />

    <form @submit.prevent="submit">
      <div class="mt-4">
        <InputLabel for="username" value="Username" />

        <TextInput
          id="username"
          type="text"
          class="mt-1 block w-full"
          v-model="form.username"
          required
          autofocus
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.username" />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password" />

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirm Password" />

        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <div class="mt-4">
        <InputLabel for="firstname" value="Firstname" />

        <TextInput
          id="firstname"
          type="text"
          class="mt-1 block w-full"
          v-model="form.firstname"
          required
          autofocus
          autocomplete="firstname"
        />

        <InputError class="mt-2" :message="form.errors.firstname" />
      </div>

      <div class="mt-4">
        <InputLabel for="middlename" value="Middlename" />

        <TextInput
          id="middlename"
          type="text"
          class="mt-1 block w-full"
          v-model="form.middlename"
          required
          autofocus
          autocomplete="middlename"
        />

        <InputError class="mt-2" :message="form.errors.middlename" />
      </div>

      <div class="mt-4">
        <InputLabel for="lastname" value="Lastname" />

        <TextInput
          id="lastname"
          type="text"
          class="mt-1 block w-full"
          v-model="form.lastname"
          required
          autofocus
          autocomplete="lastname"
        />

        <InputError class="mt-2" :message="form.errors.lastname" />
      </div>

      <div class="mt-4">
        <InputLabel for="email" value="Email" />

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <InputLabel for="division" value="Division" />
        <select
          id="division"
          class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
          v-model="form.division"
          required
          autocomplete="division"
        >
          <option value="" disabled>Select Division</option>
          <option value="BD1">BD1</option>
          <option value="BD2">BD2</option>
          <option value="BD3">BD3</option>
          <option value="BSG">BSG</option>
          <option value="HR">HR</option>
          <option value="FINANCE">FINANCE</option>
          <option value="PPI">PPI</option>
          <option value="STRAT">STRAT</option>
        </select>
      </div>

      <div class="mt-4">
        <InputLabel for="id_number" value="ID Number" />

        <TextInput
          id="id_number"
          type="number"
          class="mt-1 block w-full"
          v-model="form.id_number"
          required
          autofocus
          autocomplete="id_number"
        />

        <InputError class="mt-2" :message="form.errors.id_number" />
      </div>

      <div class="mt-4">
        <InputLabel for="principal" value="Principal" />

        <TextInput
          id="principal"
          type="text"
          class="mt-1 block w-full"
          v-model="form.principal"
          required
          autofocus
          autocomplete="principal"
        />

        <InputError class="mt-2" :message="form.errors.principal" />
      </div>

      <div class="mt-4">
        <InputLabel for="supervisor" value="Supervisor" />

        <TextInput
          id="supervisor"
          type="text"
          class="mt-1 block w-full"
          v-model="form.supervisor"
          required
          autofocus
          autocomplete="supervisor"
        />

        <InputError class="mt-2" :message="form.errors.supervisor" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          :href="route('login')"
          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Already registered?
        </Link>

        <PrimaryButton
          class="ms-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Register
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
