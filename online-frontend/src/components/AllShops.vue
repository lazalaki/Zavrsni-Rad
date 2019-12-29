<template>
    <div>
        <div v-if="!hasShops">
            <div>
                <h2>Shop list is empty</h2>
            </div>
        </div>
        <div v-if="hasShops">
            <b-table striped hover :items="shops" :fields="fields">
                <template v-slot:cell(logo)="data">
                    <img v-bind:src="data.item.logo" />
                </template>
                <template v-slot:cell(managers)="data">
                    <div @click="showManager(data.item.managers)">
                         {{getManager(data.item.managers)}}
                    </div>
                </template>
                <template v-slot:cell(actions)="row">
                    <b-button size="sm" @click="openShop(row.item.id)" class="mr-1">
                        View
                    </b-button>
                </template>
            </b-table>
            <b-button v-if="currentCount < totalCount" size="lg" @click="loadMore" class="mr-1">
                Load More
            </b-button>
            <h3>{{error}}</h3>
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
                    { key: 'name', label: 'Name' },
                    { key: 'logo', label: 'Logo'},
                    { key: 'managers', label: 'Manager'},
                    { key: 'created_at', label: 'Created At'},
                    { key: 'actions', label: 'Actions' },
                ],
                hasShops: false,
                totalCount: 0,
                currentCount: 0,
                error: ''
            }
        },
        created() {
            ShopService.getShops().then(response => {
                /* eslint-disable no-console */
                console.log(response.response.shops)
                this.shops = response.response.shops;
                this.hasShops = this.shops.length !== 0;
                this.totalCount = response.response.count;
                this.currentCount = this.shops.length;
            })
        },
        methods: {
            openShop(id) {
                this.$router.push({name: 'Shop',  params: { id: id }})
            },
            getManager(data) {
                if (data.length === 0) {
                    return 'Shop doen"t have manager';
                } else {
                    const manager = data[0];
                    return manager.firstName + ' ' + manager.lastName;
                }
            },
            showManager(data) {
                if (data.length === 0) {
                    this.error = 'You cannot open manager details';
                } else {
                    const manager = data[0];
                    const id = manager.id; 
                    this.$router.push({name: 'SingleManager', params: { id: id}})
                }
            },
            loadMore() {
                ShopService.getMore(this.currentCount).then(response => {
                    console.log(response);
                
                    this.shops = [...this.shops, ...response];
                    this.currentCount = this.currentCount + response.length;
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>