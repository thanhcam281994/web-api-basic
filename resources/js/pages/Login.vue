<template>
    <div class="t-login">
        <form>
            <v-card-title
                :class="{'t-display': displayError === true}"
                class="t-error-login">
                <span class="headline">Sai email hoặc password</span>
            </v-card-title>
            <v-text-field
                v-model="email"
                :error-messages="emailErrors"
                label="E-mail"
                required
                @input="$v.email.$touch()"
                @blur="$v.email.$touch()"
            ></v-text-field>
            <v-text-field
                type="password"
                v-model="password"
                :error-messages="passwordErrors"
                label="Password"
                required
            ></v-text-field>

            <v-btn class="mr-4" @click="submit">submit</v-btn>
            <v-btn @click="clear">clear</v-btn>
        </form>
    </div>
</template>

<script>
    import store from '@/js/config/handle';
    import { validationMixin } from 'vuelidate'
    import { required, email } from 'vuelidate/lib/validators'

    export default {
        name: "Login",
        mixins: [validationMixin],

        validations: {
            email: { required, email},
            password: { required}

        },

        data: () => ({
            email: '',
            password: '',
            displayError: false
        }),

        computed: {
            emailErrors () {
                const errors = []
                if (!this.$v.email.$dirty) return errors
                !this.$v.email.email && errors.push('Must be valid e-mail')
                !this.$v.email.required && errors.push('E-mail is required')
                return errors
            },
            passwordErrors () {
                const errors = []
                if (!this.$v.password.$dirty) return errors
                !this.$v.password.required && errors.push('Password is required.')
                return errors
            },
        },

        methods: {
            submit () {
                let app = this;
                axios.post('/auth/login', {
                    email: app.email,
                    password: app.password
                })
                    .then(function (resp) {
                        if (resp.data.code == 200) {
                            setTimeout(() => {
                                store.commit('login', resp.data.data)
                                app.$router.push({'name' : 'home'})
                            }, 1000);

                        } else {
                            app.displayError = true
                        }

                    })
                    .catch(function (resp) {
                        console.log(resp);
                    });
            },
            clear () {
                this.$v.$reset()
                this.email = ''
                this.password = ''
            }
        },
    }
</script>
<style scoped>

</style>
