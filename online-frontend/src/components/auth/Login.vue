<template>
    <div>
        <h1> Login Page </h1>
        
        <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
            <b-form-input
                id="input-1"
                v-model="form.email"
                type="email"
                required
                placeholder="Enter email">
            </b-form-input>
        </b-form-group>
      

      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.password"
          type ="password"
          required
          placeholder="Enter password" >
        </b-form-input>
      </b-form-group>
      <button @click="login">Login</button>
      <div class="error-container">
        <span>{{error}}</span>
      </div>
    </div>
</template>

<script>
    import AuthService from '../../services/auth.service';

    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                error: '',
            }
        },
        methods: {
            login() {
                this.error = '';
                /* eslint-disable no-console */
                AuthService.login(this.form)
                    .then(() => {
                        this.$store.dispatch('SetLoggedInAction');
                        this.$router.push({name: 'AllShops', query: { redirect: '/shops '}});
                    })
                    .catch((error) => {
                        this.error = error.message;
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>