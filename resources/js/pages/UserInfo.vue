<template>
    <div class="t-wrapper-info">
        <div class="t-user-info">
            <v-card-title>
                <span class="headline">Thông tin tài khoản</span>
            </v-card-title>
            <div>
                <div class="t-user-info-name">
                    <v-card-title class="t-card">
                        <span>Họ tên: </span>
                    </v-card-title>
                    <div>
                        <span class="t-card-content">{{ user.name }}</span>
                    </div>
                </div>
                <div class="t-user-info-tel">
                    <v-card-title class="t-card">
                        <span>Số điện thoại: </span>
                    </v-card-title>
                    <div>
                        <span class="t-card-content">{{ user.phone }}</span>
                    </div>
                </div>
                <div class="t-user-info-address">
                    <v-card-title class="t-card">
                        <span>Địa chỉ: </span>
                    </v-card-title>
                    <div>
                        <span class="t-card-content">{{ user.address }}</span>
                    </div>
                </div>
            </div>
            <router-link
                :to="{name: 'update-user-info',  params: {id: user.email}}"
            >
                <v-btn color="primary">Update</v-btn>
            </router-link>

        </div>
    </div>
</template>
<script>
    export default {
        name: "UserInfo",
        data: function() {
            return {
                user: {
                    name: '',
                    phone: '',
                    address: '',
                    email: ''
                }
            }
        },
        mounted() {
            this.getUserInfo();
        },

        methods: {
            getUserInfo: function () {
                let app = this;
                axios.get('/auth/user').then(function (resp) {
                    app.user.email = resp.data.data.email;
                    app.user.name = resp.data.data.name;
                    app.user.phone = resp.data.data.tel;
                    app.user.address = resp.data.data.address;
                }).catch(function (resp) {
                        console.log(resp);
                });
            }
        }
    }
</script>

<style scoped>

</style>
