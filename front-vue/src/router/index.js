import { createRouter, createWebHistory } from "vue-router";
import ProjectsPage from "../views/ProjectsPage.vue";
import ProjectsView from "../views/ProjectsView.vue";
import LoginForm from "../views/LoginForm.vue";
import RegisterForm from "../views/RegisterForm.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "@/store";

const routes = [
    {
        path: "/",
        redirect: "/projects",
        name: "Projects",
        component: DefaultLayout,
        meta: { requiresAuth: true },
        children: [
            { path: "/projects", name: "Projects", component: ProjectsPage },
            {
                path: "/projects/create",
                name: "ProjectCreate",
                component: ProjectsView,
            },
        ],
    },
    {
        path: "/auth",
        redirect: "/login",
        name: "Auth",
        component: AuthLayout,
        meta: { isGuest: true },
        children: [
            {
                path: "/login",
                name: "Login",
                component: LoginForm,
            },
            {
                path: "/register",
                name: "Register",
                component: RegisterForm,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "Login" });
    } else if (store.state.user.token && to.meta.isGuest) {
        next({ name: "Projects" });
    } else {
        next();
    }
});

export default router;
