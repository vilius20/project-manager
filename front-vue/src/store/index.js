import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state: {
        user: {
            data: [],
            token: sessionStorage.getItem("TOKEN"),
            // token: 123,
        },
        students: {
            save: [],
            data: [],
            update: [],
            noGroup: [],
        },
        projects: {
            data: [],
            save: [],
        },
        groups: {
            data: [],
        },
    },
    getters: {},
    actions: {
        deleteProject(project) {
            let response;
            response = axiosClient.delete(`/projects`, project).then((res) => {
                return res;
            });
            return response;
        },
        updateStudent({ commit }, student) {
            let response;
            response = axiosClient.put("/students", student).then((res) => {
                commit("updateStudent", res.data);
                return res;
            });
            return response;
        },
        saveStudent({ commit }, student) {
            let response;
            response = axiosClient.post("/students", student).then((res) => {
                commit("saveStudent", res.data);
                return res;
            });
            return response;
        },
        getProjects({ commit }) {
            axiosClient.get("/projects").then((res) => {
                commit("setProjects", res.data);
            });
            // setInterval(function () {
            axiosClient.get("/projects").then((res) => {
                console.log("Information updated...");
                commit("setProjects", res.data);
            });
            // }, 10000);
        },
        saveProject({ commit }, project) {
            let response;
            response = axiosClient.post("/projects", project).then((res) => {
                commit("saveProject", res.data);
                return res;
            });
            return response;
        },
        register({ commit }, user) {
            return fetch(`https://plexas.lt/sanctum/csrf-cookie`, {
                mode: "no-cors",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                method: "GET",
            }).then(() => {
                return axiosClient.post("/register", user).then((res) => {
                    console.log(res);
                    commit("setUser", res.data);
                    return res;
                });
            });
        },
        login({ commit }, user) {
            return fetch(`https://dotask.eu/sanctum/csrf-cookie`, {
                mode: "no-cors",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                method: "GET",
            }).then(() => {
                return axiosClient.post("/login", user).then((res) => {
                    commit("setUser", res.data);
                    return res;
                });
            });
        },
        logout({ commit }) {
            return axiosClient.post("/logout").then((response) => {
                sessionStorage.removeItem("TOKEN");
                commit("logout");
                return response;
            });
        },
    },
    mutations: {
        setProjects: (state, projects) => {
            state.projects.data = projects.PROJECTS;
            state.groups.data = projects.GROUPS;
            state.students.data = projects.STUDENTS;
            state.students.noGroup = projects.STUDENTS_NO_GROUP;
        },
        updateStudent: (state, student) => {
            state.students.update = student;
        },
        saveStudent: (state, student) => {
            state.students.save = student;
        },
        saveProject: (state, project) => {
            state.projects.save = project;
        },
        logout: (state) => {
            state.user.data = {};
            state.user.token = null;
        },
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.data = userData.user;
            sessionStorage.setItem("TOKEN", userData.token);
        },
    },
    modules: {},
});

export default store;
