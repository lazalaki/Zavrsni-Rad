import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        isLoggedIn: false,
    },
    getters: {
        isLoggedIn: state => {
            return state.isLoggedIn;
        }
    },
    // poziva se sa store.commit('...')
    mutations: {
        SET_LOGGED_IN: (state) => {
            state.isLoggedIn = true;
        },
        SET_LOGGED_OUT: (state) => {
            state.isLoggedIn = false;
        }
    },
    // poziva se sa store.dispatch('...')
    // akcija -> mutaciju -> stanje -> getter 
    actions: {
        SetLoggedInAction: (context) => {
            context.commit('SET_LOGGED_IN');
        },
        SetLoggedOutAction: (context) => {
            context.commit('SET_LOGGED_OUT');
        }
    }
})