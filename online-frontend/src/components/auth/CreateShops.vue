<template>
    <div>
        <b-form-group id="input-group-1" label="Your Shop Name:" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="form.name"
          required
          placeholder="Enter Shop Name">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Shop Logo:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.logo"
          required
          placeholder="Add Shop Logo">
        </b-form-input>
      </b-form-group>

      <div>
          <label>Select Manager:</label>
    <b-form-select v-model="form.managerId" class="mb-3">
      <option v-for="manager in managers" :value="manager.id" :key="manager.id">{{ manager.firstName }} {{ manager.lastName }}</option>
      
    </b-form-select>
  </div>

      <button type="submit" @click="submit">Submit</button>
    <button type="submit" @click="cancel">Cancel</button>
      <div class="error-container">
        <span>{{error}}</span>
      </div>
    </div>
</template>

<script>

import ShopService from '../../services/shops.service'
import ManagerService from '../../services/managers.service'

    export default {
        /* eslint-disable no-console */
        data() {
            return {
                form: {
                    name: '',
                    logo: '',
                    managerId: ''
                },
                managers: [],
                error: '',            
            }
        },
        created() {
            ManagerService.getManagers().then(response => {
                this.managers = response;
            })
        },
        methods: {
            submit() {
                this.error = '';
                ShopService.createShop(this.form)
                .then(() => {
                    this.$router.push({ name: 'AllShops' })
                })
                .catch((error) => {
                    this.error = this.extractErrorMessage(error);
                })
            },
            extractErrorMessage(error) {
              let errorMessage = '';
              Object.keys(error.errors).forEach(er => {
                errorMessage = errorMessage + ' ' + error.errors[er][0];
              })
              return errorMessage;
            },
            cancel() {
              this.$router.push({name: 'AllShops'})
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>