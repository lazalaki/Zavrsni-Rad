<template>
    <div>
        <b-table striped hover :items="managers" :fields="fields">
            <template v-slot:cell(actions)="row">
                    <b-button size="sm" @click="openManagers(row.item.id)" class="mr-1">
                        View
                    </b-button>
                </template>
        </b-table>
    </div>
</template>

<script>

import ManagerService from '../services/managers.service'
    export default {
        data() {
            return {
                managers: [],
                fields: [
                    { key: 'id', label: 'Redni Broj' },
                    { key: 'firstName', label: 'First Name'},
                    { key: 'lastName', label: 'Last Name'},
                    { key: 'email', label: 'Email'},
                    { key: 'actions', label: 'Actions'}
                ]

            }
        },

        created() {
            ManagerService.getAllManagers()
            .then(response => { 
                this.managers = response 
            })
        },

        methods: {
            openManagers(id) {
                this.$router.push({name: 'SingleManager', params: { id: id}})
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>