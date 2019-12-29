<template>
    <div>
        <b-form-group id="input-group-1" label="Article Name:" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="form.name"
          required
          placeholder="Enter Article Name">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Article Price:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.price"
          required
          placeholder="Enter Article Price">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Article Description:" label-for="input-3">
        <b-form-input
          id="input-3"
          v-model="form.description"
          required
          placeholder="Enter Article Description">
        </b-form-input>
      </b-form-group>

      <b-form-group id="input-group-4" label="Article Url:" label-for="input-4">
        <b-form-input
          id="input-4"
          v-model="form.url"
          required
          placeholder="Enter Article Url">
        </b-form-input>
      </b-form-group>

      <button type="submit" @click="submit">Submit</button>
      <div class="error-container">
        <span>{{error}}</span>
      </div>
    </div>
</template>

<script>

import ArticlesService from '../../services/articles.service'

    export default {
      // eslint-disable-next-line
        beforeRouteEnter(to, from, next) {
            const id = to.params.id;
            next(onCreateComponent => onCreateComponent.setValues(id))
        },
        data() {
            return {
                form: {
                    name: '',
                    price: '',
                    description: '',
                    url: ''
                },
                error: '',
                id: '',
            }
        },

        methods: {
            submit() {
                /* eslint-disable no-console */
                ArticlesService.createArticles(this.form, this.id)
                .then(() => {
                    this.$router.push({name: 'AllShops'})
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
            setValues(id) {
              this.id = id;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>