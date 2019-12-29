<template>
    <div>
        <h1>Manager {{fullName}}</h1>
        <b-container fluid>
            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">First Name:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="firstName" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Last Name:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="lastName" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Email:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="email" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Created At:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="createdAt" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Photo:</label>
                </b-col>
                <b-col sm="10">
                 <img v-bind:src="shopLogo" />
                </b-col>
            </b-row>
        </b-container>
        <div v-if="hasJob">
             <h1>Current Job in shop {{shopName}}</h1>
             <b-container fluid>
            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Name:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="shopName" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Shop Logo:</label>
                </b-col>
                <b-col sm="10">
                 <img v-bind:src="shopLogo" />
                </b-col>
            </b-row>

             <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Shop Created At:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="shopCreatedAt" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>
        </b-container>
        </div>
        <div v-if="!hasJob">
             <h1>Manager is free</h1>
        </div>
       
    </div>
</template>

<script>
    import ManagerService from './../services/managers.service';

    export default {
        // eslint-disable-next-line
        beforeRouteEnter(to, from, next) {
            const id = to.params.id;
            ManagerService.getManagersById(id).then(response => {
                next(onCreateComponent => onCreateComponent.setValues(response))
            });
        },
        data() {
            return {
                fullName: '',
                firstName: '',
                lastName: '',
                email: '',
                createdAt: '',
                shopName: '',
                shopLogo: '',
                hasJob: false,
                shopCreatedAt: ''
            }
        },
        methods: {
            setValues(values) {
                const manager = values.response.manager;
                this.fullName = manager.firstName + ' ' + manager.lastName;
                this.firstName = manager.firstName;
                this.lastName = manager.lastName;
                this.email = manager.email;
                this.createdAt = manager.created_at;
                this.photo = manager.url;
                // eslint-disable-next-line
                const shops = values.response.shop;
                this.hasJob = shops.length !== 0;
                if (this.hasJob) {
                    const shop = shops[0];
                    this.shopName = shop.name;
                    this.shopLogo = shop.logo;
                    this.shopCreatedAt = shop.created_at;
                }
            },
            // ShopArticles(id) {
            //     ManagerService.getARticlesForShop(id).then(response => this.articles = response)
            // }
        }
    }
</script>

<style lang="scss" scoped>

</style>