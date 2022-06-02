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
                <div class="grid">
                    <div v-if="!projects.length">
                        <p class="text-2xl m-2">There is no projects...</p>
                    </div>
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
                                @click="deleteProject(project.id)"
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
                        <div
                            class="text-lg font-bold mt-4 flex gap-2 items-center"
                        >
                            <h1>Groups:</h1>
                            <p class="text-red-500">{{ project.groups }}</p>
                        </div>

                        <div
                            class="text-lg font-bold mt-4 flex gap-2 items-center mb-3"
                        >
                            <h1>Students:</h1>
                            <p class="text-red-500">{{ project.students }}</p>
                        </div>

                        <h1 class="text-3xl mb-3">Students</h1>
                        <div class="border-x-2 border-t-2 rounded bg-slate-100">
                            <div
                                class="flex justify-around border-b-2 p-2 pb-3 pt-3"
                            >
                                <h1 class="w-1/4 flex justify-center font-bold">
                                    Students
                                </h1>
                                <h1
                                    class="w-1/4 flex justify-center font-bold mr-2"
                                >
                                    Groups
                                </h1>
                                <h1 class="w-1/4 flex justify-center font-bold">
                                    Actions
                                </h1>
                            </div>
                            <div v-for="student in students" :key="student.id">
                                <div class="flex justify-around border-b-2 p-2">
                                    <div class="w-1/4 flex justify-center">
                                        <p
                                            class="text-indigo-600 font-medium text-center"
                                        >
                                            {{ student.student }}
                                        </p>
                                    </div>

                                    <div class="w-1/4 flex justify-center">
                                        <div v-if="student.group !== null">
                                            <p class="font-bold">
                                                Group# {{ student.group }}
                                            </p>
                                        </div>
                                        <div class="font-bold" v-else>
                                            No group assigned!
                                        </div>
                                    </div>

                                    <div class="w-1/4 flex justify-center">
                                        <button
                                            @click="deleteStudent(student.id)"
                                            class="text-red-500 font-bold"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block md:w-1/4 shadow-sm sm:text-sm border-gray-300 rounded-md"
                                />
                                <button
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Add student
                                </button>
                            </div>
                        </form>
                        <div
                            v-if="errorMsg"
                            class="flex items-center justify-between m-4 py-2 px-4 bg-red-500 text-white rounded"
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
                        <h1 class="text-3xl mb-2">Groups</h1>
                        <div
                            class="grid grid-cols-1 gap-1 md:grid-cols-3 md:gap-4"
                        >
                            <div v-for="group in groups" :key="group.id">
                                <div v-if="group.project_id == project.id">
                                    <div
                                        class="bg-slate-100 p-4 flex flex-col items-center rounded border-2"
                                    >
                                        <h1 class="text-2xl m-2">
                                            {{ group.title }} {{ group.id }}
                                        </h1>
                                        <div
                                            v-for="student in students"
                                            :key="student.id"
                                        >
                                            <div
                                                v-if="group.id == student.group"
                                            >
                                                <h1
                                                    class="m-2 text-indigo-600 font-medium"
                                                >
                                                    {{ student.student }}
                                                </h1>
                                            </div>
                                        </div>
                                        <div>
                                            <form
                                                class="flex flex-col items-center"
                                                @submit.prevent="studentGroup"
                                            >
                                                <div>
                                                    <ul>
                                                        <li
                                                            class="flex items-center justify-between m-2"
                                                            v-for="student in studentsNoGroup"
                                                            :key="student.id"
                                                        >
                                                            <label
                                                                for="student"
                                                                class="text-red-500 font-bold pr-2"
                                                                >{{
                                                                    student.student
                                                                }}</label
                                                            >
                                                            <input
                                                                type="checkbox"
                                                                id="studentGroupValues"
                                                                class="studentGroupValues"
                                                                :value="
                                                                    group.id +
                                                                    ' ' +
                                                                    student.id
                                                                "
                                                            />
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button
                                                    class="inline-flex justify-center mt-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                >
                                                    Add student
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import store from "../store";
import { computed } from "vue";
import { ref } from "vue";
import { useRouter } from "vue-router";
import axiosClient from "../axios";

const router = useRouter();

const projects = computed(() => store.state.projects.data);
const groups = computed(() => store.state.groups.data);
const students = computed(() => store.state.students.data);
const studentsNoGroup = computed(() => store.state.students.noGroup);

let model = ref({
    student: null,
    groupIdstudentId: null,
});

let errorMsg = ref("");

store.dispatch("getProjects");

function saveStudent() {
    store
        .dispatch("saveStudent", model.value)
        .then(() => {
            router.go();
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

function studentGroup() {
    let values = document.querySelectorAll(".studentGroupValues");

    let arr = [];
    values.forEach((value) => {
        if (value.checked === true) {
            arr.push(value.value);
        }
    });
    let response;
    response = axiosClient
        .put("/students", arr)
        .then((res) => {
            router.go();
            return res;
        })
        .catch((err) => {
            errorMsg.value = err.response.data.message;
            if (err.response.data.message == "Unauthenticated.") {
                sessionStorage.removeItem("TOKEN");
                localStorage.setItem("msg", err.response.data.message);
                router.go();
            }
        });
    return response;
}

function deleteProject(projectId) {
    if (confirm("Are you sure you want to delete this project?")) {
        let response;
        response = axiosClient
            .delete(`/projects/${projectId}`)
            .then((res) => {
                router.go();
                return res;
            })
            .catch((err) => {
                errorMsg.value = err.response.data.message;
                if (err.response.data.message == "Unauthenticated.") {
                    sessionStorage.removeItem("TOKEN");
                    localStorage.setItem("msg", err.response.data.message);
                    router.go();
                }
            });
        return response;
    }
}

function deleteStudent(studentId) {
    console.log(studentId);
    let response;
    response = axiosClient
        .delete(`/students/${studentId}`)
        .then((res) => {
            router.go();
            return res;
        })
        .catch((err) => {
            errorMsg.value = err.response.data.message;
            if (err.response.data.message == "Unauthenticated.") {
                sessionStorage.removeItem("TOKEN");
                localStorage.setItem("msg", err.response.data.message);
                router.go();
            }
        });
    return response;
}
</script>

<style></style>
