<template>
  <div>
    <header class="bg-white shadow">
      <div
        class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
      >
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <router-link
          :to="{ name: 'ProjectCreate' }"
          class="py-2 px-3 text-white bg-emerald-500 rounded-md hover:bg-emerald-600"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 -mt-1 inline-block"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 4v16m8-8H4"
            />
          </svg>
          Add new project
        </router-link>
      </div>
    </header>

    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="grid">
          <div
            v-for="project in projects"
            :key="project.id"
            class="flex flex-col py-4 px-6 shadow-md bg-white hover:bg-gray-50"
          >
            <h1 class="mt-4 text-lg font-bold">{{ project.title }}</h1>
            <h1 class="mt-4 text-lg font-bold">
              Groups:
              <p>{{ project.groups }}</p>
            </h1>
            <h1 class="mt-4 text-lg font-bold">
              Students:
              <p>{{ project.students }}</p>
            </h1>
            <div class="flex justify-between items-center mt-3">
              <button
                v-if="project.id"
                type="button"
                @click="deleteProject(project)"
                class="h-8 w-8 flex items-center justify-center rounded-full border border-transparent text-sm text-red-500 focus:ring-2 fcus:ring-offset-2 focus:ring-red-500"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-8 w-8"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script setup>
import store from '../store';
import { computed } from 'vue';

const projects = computed(() => store.state.projects);

function deleteProject(project) {
  if (confirm('Are you sure you want to delete this project?')) {
    //
  }
}
</script>
