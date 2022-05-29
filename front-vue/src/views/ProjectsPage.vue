<template>
    <div>
        <header class="bg-white shadow">
            <div
                class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
            >
                <h1 class="text-3xl font-bold text-gray-900">Projects</h1>
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
                        <div class="flex items-center mt-4 justify-between">
                            <h1 class="text-4xl font-bold">
                                {{ project.title }}
                            </h1>
                            <button
                                v-if="project.id"
                                type="button"
                                @click="deleteProject(project)"
                                class="h-8 w-8 flex items-center justify-center rounded-full border border-transparent text-sm text-red-500 focus:ring-2 fcus:ring-offset-2 focus:ring-red-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
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
                        <h1 class="mt-4 text-lg font-bold">
                            Groups:
                            <p>{{ project.groups }}</p>
                        </h1>
                        <h1 class="mt-4 text-lg font-bold">
                            Students:
                            <p>{{ project.students }}</p>
                        </h1>
                        <h1 class="text-3xl">Students</h1>
                        <form @submit.prevent="saveStudent">
                            <div
                                class="flex gap-2 rounded mt-4 mb-4 items-center"
                            >
                                <input
                                    type="text"
                                    name="groups"
                                    id="groups"
                                    v-model="model.student"
                                    autocomplete="project_groups"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-1/4 shadow-sm sm:text-sm border-gray-300 rounded-md"
                                />
                                <button
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Add student
                                </button>
                            </div>
                        </form>
                        <h1 class="text-3xl">Groups</h1>
                        <div class="" v-for="group in groups" :key="group.id">
                            <div v-if="group.project_id == project.id">
                                <h1>{{ group.title }} {{ group.id }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </div>
</template>

<script setup>
import store from "../store";
import { computed } from "vue";
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const projects = computed(() => store.state.projects.data);
const groups = computed(() => store.state.groups.data);

let model = ref({
    student: null,
});

store.dispatch("getProjects");

function saveStudent() {
    store.dispatch("saveStudent", model.value).then(() => {
        router.push({
            name: "Projects",
        });
    });
}

// function deleteProject(project) {
//   if (confirm('Are you sure you want to delete this project?')) {
//     //
//   }
// }
</script>
