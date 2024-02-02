<script>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { usePage } from '@inertiajs/inertia-vue3';

export default {
  components: {
    Head,
    Link,
  },

  setup() {
    const form = useForm({
      username: "",
      password: "",
      name: "",
      email: "",
    });

    const page = usePage();

    const submit = () => {
      form.post(route("registerAccount"), {
        onFinish: () => form.reset("password"),
        headers: {
          'X-CSRF-TOKEN': page.props.csrfToken,
        },
      });
    };

    return {
      form,
      submit,
    };
  },

  data() {
    return {
      loading: false,
    };
  },

  methods: {
    async handleClick() {
      // Set loading to true before the async operation
      this.loading = true;

      try {
        // Your async operation (e.g., API request)
        await this.someAsyncOperation();
      } catch (error) {
        console.error("Error:", error);
      } finally {
        // Set loading back to false after the async operation completes
        this.loading = false;
      }
    },
    someAsyncOperation() {
      // Simulate an async operation (replace this with your actual async code)
      return new Promise((resolve) => {
        setTimeout(() => {
          resolve();
        }, 2000); // Simulating a 2-second delay
      });
    },
  },
};
</script>
<template>
  <Head title="Login" />
  <div>
    <form @submit.prevent="submit">
      <div class="container mx-auto">
        <h1 class="text-3xl text-purple-400 text-center mt-9">This is login page</h1>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="xs:col-span-4 sm:col-span-6 md:col-span-6">
            <label
              for="username"
              class="block text-sm font-medium leading-6 text-gray-900"
              >Username</label
            >
            <div class="mt-2">
              <input
                type="text"
                name="username"
                id="username"
                v-model="form.username"
                autocomplete="username"
                class="block w-full rounded-md border-0 p-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                required
              />
            </div>
          </div>
          <div class="sm:col-span-6">
            <label
              for="password"
              class="block text-sm font-medium leading-6 text-gray-900"
              >Password</label
            >
            <div class="mt-2">
              <input
                type="password"
                name="password"
                v-model="form.password"
                id="password"
                autocomplete="family-name"
                required
                class="block w-full rounded-md border-0 p-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900"
              >Name</label
            >
            <div class="mt-2">
              <input
                type="text"
                name="name"
                id="name"
                v-model="form.name"
                autocomplete="family-name"
                required
                class="block w-full rounded-md border-0 p-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900"
              >Email Address</label
            >
            <div class="mt-2">
              <input
                type="email"
                name="email"
                id="email"
                v-model="form.email"
                autocomplete="family-name"
                required
                class="block w-full rounded-md border-0 p-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>

          <div class="sm:col-span-6">
            <button
              :class="{ 'opacity-50 cursor-not-allowed':  loading || form.processing }"
              class="bg-blue-500 hover:bg-blue-700 text-white font-sans py-2 px-4 rounded"
              @click="handleClick"
              :disabled="loading && form.processing"
            >
              <span v-if="loading">Loading...</span>
              <span v-else>Register</span>
            </button>
          </div>

          <div class="sm:col-span-6">
            <Link
              :href="route('Login')"
              class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >Have already account?
            </Link>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
