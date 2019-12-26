<template>
    <div>
        <h1>Ja sam login</h1>
        
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
                }
            }
        },
        methods: {
            login() {
                /* eslint-disable no-console */
                AuthService.login(this.form)
                    .then(() => {
                        console.log(this.$store.getters.isLoggedIn);
                        this.$store.dispatch('SetLoggedInAction');
                        this.$router.push({name: 'Home', query: { redirect: '/home '}});
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>