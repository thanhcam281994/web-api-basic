import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({
   state: {
       isLoggedIn: !!localStorage.getItem('token'),
       token: localStorage.getItem('token')
   },
   mutations: {
        login(state, data) {
            state.isLoggedIn = true;
            let token = data.token;
            let tokenType = data.token_type;
            state.token = token;
            localStorage.setItem('token', tokenType + ' ' + token)
        },
        logout(state) {
            state.isLoggedIn = false;
            state.token = localStorage.removeItem('token');
        }
   }
});
