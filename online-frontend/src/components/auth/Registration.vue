<template>
    <div>
        <b-form-group id="input-group-2" label="Your First Name:" label-for="input-2">
        <b-form-input
          id="input-2"
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

      <b-form-group id="input-group-2" label="Your Email:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.email"
          required
          placeholder="Enter Email">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Password:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.password"
          required
          placeholder="Enter Password">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Url;" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.url"
          required
          placeholder="Enter Url">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Role:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.role"
          required
          placeholder="Enter Role">
        </b-form-input>
      </b-form-group>

      <button type="submit" @click="submit">Submit</button>
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
                    url: '',
                    role: ''
                },
            }
        },

        methods: {
            submit() {
                /* eslint-disable no-console */
                console.log(this.form)
                AuthService.createUser(this.form)
                .then(() => {
                    this.$router.push({ name: 'Login' })
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

submitContact () {
      contact.add(this.newContact).then(r => {
        console.log('Contact added', r);
        this.contacts.push(r.data);
      });