<template>
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900 m-4">
            Create Project {{ userData }}
        </h1>
    </div>
    <form @submit.prevent="saveProject">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700"
                        for="title"
                    >
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        v-model="model.title"
                        autocomplete="project_title"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                </div>
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700"
                        for="title"
                    >
                        Groups
                    </label>
                    <input
                        type="number"
                        name="groups"
                        id="groups"
                        v-model="model.groups"
                        autocomplete="project_groups"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                </div>
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700"
                        for="title"
                    >
                        Students
                    </label>
                    <input
                        type="number"
                        name="students"
                        id="students"
                        v-model="model.students"
                        autocomplete="project_students"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                </div>

                <div class="px-4 rounded py-3 bg-gray-50 text-right sm:px-6">
                    <button
                        type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import store from "../store";
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

let model = ref({
    title: "",
    groups: null,
    students: null,
});

function saveProject() {
    store.dispatch("saveProject", model.value).then(() => {
        router.push({
            name: "Projects",
        });
    });
}
</script>

<style></style>
