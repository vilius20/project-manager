<template>
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900 m-4">
            Create Project {{ userData }}
        </h1>
    </div>
    <form @submit.prevent="saveProject">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div
                    v-if="errorMsg"
                    class="flex items-center justify-between py-2 px-4 bg-red-500 text-white rounded"
                >
                    {{ errorMsg }}
                    <span
                        class="cursor-pointer flex items-center transition-colors rounded-full hover:bg-[rgba(0,0,0,0.2)]"
                        @click="errorMsg = ''"
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
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </span>
                </div>
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

let errorMsg = ref("");

function saveProject() {
    store
        .dispatch("saveProject", model.value)
        .then(() => {
            router.push({
                name: "Projects",
            });
        })
        .catch((err) => {
            errorMsg.value = err.response.data.message;
            if (err.response.data.message == "Unauthenticated.") {
                sessionStorage.removeItem("TOKEN");
                localStorage.setItem("msg", err.response.data.message);
                router.go();
            }
        });
}
</script>

<style></style>
