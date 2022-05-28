import { createStore } from 'vuex';
import axiosClient from '../axios';

const tmpProjects = [
  {
    id: 14,
    user_id: '7',
    title: 'Ketvirtas',
    groups: '5',
    students: '5',
    created_at: '2022-05-28T19:54:44.000000Z',
    updated_at: '2022-05-28T19:54:44.000000Z',
  },
  {
    id: 13,
    user_id: null,
    title: 'Trecias',
    groups: '2',
    students: '2',
    created_at: '2022-05-28T19:53:56.000000Z',
    updated_at: '2022-05-28T19:53:56.000000Z',
  },
];

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem('TOKEN'),
    },
    projects: [...tmpProjects],
  },
  getters: {},
  actions: {
    register({ commit }, user) {
      return fetch(`https://dotask.eu/sanctum/csrf-cookie`, {
        mode: 'no-cors',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
        },
        method: 'GET',
      }).then(() => {
        return axiosClient.post('/register', user).then((data) => {
          commit('setUser', data);
          return data;
        });
      });
    },
    login({ commit }, user) {
      return fetch(`https://dotask.eu/sanctum/csrf-cookie`, {
        mode: 'no-cors',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
        },
        method: 'GET',
      }).then(() => {
        return axiosClient.post('/login', user).then((data) => {
          commit('setUser', data);
          return data;
        });
      });
    },
    logout({ commit }) {
      return axiosClient.post('/logout').then((response) => {
        commit('logout');
        return response;
      });
    },
  },
  mutations: {
    logout: (state) => {
      state.user.data = {};
      state.user.token = null;
    },
    setUser: (state, userData) => {
      state.user.token = userData.data.token;
      state.user.data = userData.data.user;
      sessionStorage.setItem('TOKEN', userData.data.token);
    },
  },
  modules: {},
});

export default store;
