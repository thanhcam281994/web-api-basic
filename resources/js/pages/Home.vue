<template>
    <div>
        <div class="t-home" v-if=" !this.$store.state.isLoggedIn">
            <div>
                Đăng nhập để xem được nhiều thông tin hơn.
            </div>
            <router-link
                :to="{name: 'login'}"
            >Login</router-link>
        </div>
        <div v-if=" this.$store.state.isLoggedIn">
            <router-link
                :to="{name: 'user-info'}"
            >Thông tin người dùng</router-link>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style scoped>

</style>
