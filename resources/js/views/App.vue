<template>
    <v-app class="t-app">
        <v-app-bar
            app
            color="grey lighten-3"
            elevation="0"
            min-height="40"
            class="t-app-bar"
        >
            <div style="">
                Chào mừng bạn đến với bài test
            </div>
            <div v-if="this.$store.state.isLoggedIn">
                <v-btn
                    color="primary" @click="logoutMethod">Logout</v-btn>
            </div>
        </v-app-bar>
        <v-content>
            <router-view></router-view>
        </v-content>
    </v-app>
</template>

<script>
    import store from '@/js/config/handle';
    export default {
        name: "App",
        data: () => ({
            isLogout: true
        }),
        mounted() {
            if (localStorage.getItem('access-token')) {
                this.isLogout = false;
            }
        },
        methods: {
            logoutMethod: function () {
                let app = this;
                axios.post('/auth/logout', '', [

                ]).then(function (resp) {
                    setTimeout(() => {
                        store.commit('logout');
                        app.$router.push('/login')
                    }, 500);
                })
                    .catch(function (resp) {
                        console.log(resp);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
