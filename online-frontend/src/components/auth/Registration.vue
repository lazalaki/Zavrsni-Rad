<template>
    <div>
        <b-form-group id="input-group-1" label="Your First Name:" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="form.firstName"
          required
          placeholder="Enter First Name">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Last Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.lastName"
          required
          placeholder="Enter Last Name">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Your Email:" label-for="input-3">
        <b-form-input
          id="input-3"
          v-model="form.email"
          required
          placeholder="Enter Email">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-4" label="Your Password:" label-for="input-4">
        <b-form-input
          id="input-4"
          type="password"
          v-model="form.password"
          required
          placeholder="Enter Password">
        </b-form-input>
      </b-form-group>

            <b-form-group id="input-group-5" label="Confirm Password:" label-for="input-5">
        <b-form-input
          id="input-5"
          type="password"
          v-model="form.confirmPassword"
          required
          placeholder="Confirm Password">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-6" label="Your Url:" label-for="input-6">
        <b-form-input
          id="input-6"
          v-model="form.url"
          required
          placeholder="Enter Url">
        </b-form-input>
      </b-form-group>

      <b-form-checkbox value="true" v-model="form.acceptedTerms">I accept terms and conditions</b-form-checkbox><br>

      <button type="submit" @click="submit">Register</button>

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
                    firstName: '',
                    lastName: '',
                    email: '',
                    password: '',
                    confirmPassword: '',
                    url: '',
                    role: '',
                    acceptedTerms: false
                },
                error: '',
            }
        },

        methods: {
            submit() {
                /* eslint-disable no-console */
                AuthService.createUser(this.form)
                .then(() => {
                    this.$router.push({ name: 'Login' });
                    this.error = '';
                })
                .catch((error) => {
                  let errorMessage = error[0];
                  if (!errorMessage) {
                    this.error = this.extractErrorMessage(error);
                  } else {
                    this.error = errorMessage;
                  }
                })
            },
            extractErrorMessage(error) {
              let errorMessage = '';
              Object.keys(error.errors).forEach(er => {
                errorMessage = errorMessage + ' ' + error.errors[er][0];
              })
              console.log(errorMessage)
              return errorMessage;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>

