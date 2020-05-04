<template>
    <div class="t-wrapper-info">
        <div class="t-user-info">
            <v-card-title>
                <span class="headline">Sửa thông tin tài khoản</span>
            </v-card-title>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="t-user-info-name">
                        <v-card-title class="t-card">
                            <span>Họ tên: </span>
                        </v-card-title>
                        <div>
                            <v-text-field
                                v-model="user.name"
                                label="Name"
                                required
                            ></v-text-field>
                        </div>
                    </div>
                    <div class="t-user-info-tel">
                        <v-card-title class="t-card">
                            <span>Số điện thoại: </span>
                        </v-card-title>
                        <div>
                            <v-text-field
                                v-model="user.phone"
                                label="Phone"
                                required
                            ></v-text-field>
                        </div>
                    </div>
                    <div class="t-user-info-address">
                        <v-card-title class="t-card">
                            <span>Địa chỉ: </span>
                        </v-card-title>
                        <div>
                            <v-text-field
                                v-model="user.address"
                                label="Address"
                                required
                            ></v-text-field>
                        </div>
                    </div>

                    <div class="t-user-info-address">
                        <v-btn type="submit" color="primary">Update</v-btn>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UpdateUser",
        data: function () {
            return {
                user: {
                    name: '',
                    phone: '',
                    address: ''
                }
            }
        },
        mounted() {
            this.getUserInfo();
        },
        methods: {
            saveForm: function () {
                let app = this;
                axios.put('/users/' + app.user.email, {
                    name : app.user.name,
                    tel: app.user.phone,
                    address: app.user.address
                }).then(function (resp) {
                    app.$router.push({'name' : 'user-info'})
                }).catch(function (resp) {
                    console.log(resp);
                });
            },
            getUserInfo: function () {
                let app = this;
                axios.get('/auth/user', '',   {
                    headers: {
                        'Authorization': localStorage.getItem('token')
                    }
                }).then(function (resp) {
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
