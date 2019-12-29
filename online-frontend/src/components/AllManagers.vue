<template>
    <div>
        <b-table striped hover :items="managers" :fields="fields">
            <template v-slot:cell(url)="data">
                <img v-bind:src="data.item.url" />
            </template>
            <template v-slot:cell(shops)="data">
                {{getShop(data.item.shops)}}
            </template>
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
                    { key: 'firstName', label: 'First Name'},
                    { key: 'lastName', label: 'Last Name'},
                    { key: 'email', label: 'Email'},
                    { key: 'url', label: 'Image'},
                    { key: 'shops', label: 'Shop'},
                    { key: 'actions', label: 'Manager Info'}
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
            },
            getShop(data) {
                if (data.length === 0) {
                    return 'Manager is available';
                } else {
                    const shop = data[0];
                    return shop.name;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>