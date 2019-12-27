<template>
    <div>
        <div>
            <b-table striped hover :items="shops" :fields="fields">
                <template v-slot:cell(actions)="row">
                    <b-button size="sm" @click="openShop(row.item.id)" class="mr-1">
                        View
                    </b-button>
                </template>
            </b-table>
        </div>
    </div>
</template>

<script>

import ShopService from './../services/shops.service'

    export default {        
        data() {
            return {
                shops: [],
                fields: [
                    {key: 'id', label: 'Redni broj'},
                    { key: 'name', label: 'Name' },
                    { key: 'logo', label: 'Logo'},
                    { key: 'actions', label: 'Actions' }
                ]
            }
        },

        created() {
            ShopService.getShops().then(response => {
                this.shops = response;
            })
        },
        methods: {
            openShop(id) {
                this.$router.push({name: 'Shop',  params: { id: id }})
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>