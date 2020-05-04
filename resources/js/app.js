import './bootstrap';
import Vue from "vue";
import vuetify from "@/js/plugins/vuetify";
import Routes from '@/js/routers/routes';
import App from '@/js/views/App';
import axios from "axios";
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import store from '@/js/config/handle';

Vue.router = Routes;
App.router = Vue.router;
Vue.use(VueRouter);

Vue.use(VueAxios, axios);

axios.defaults.baseURL = `http://127.0.0.1:8000/api`;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.defaults.headers.post['Accept'] = 'application/json';
axios.interceptors.response.use((response) => {
    return response
}, function (error) {
    const res = error.response
    switch (res.status) {
        case 401:
            store.commit('logout');
            app.$router.push({'name': 'login'});
            break
        default:
            break;
    }
    return Promise.resolve(res)
})

const app = new Vue({
    vuetify,
    router: Routes,
    store,
    render: h => h(App),
}).$mount('#app');

export default app;
