<template>
    <div>
        <b-container fluid>
            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Name:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="name" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Logo:</label>
                </b-col>
                <b-col sm="10">
                 <img v-bind:src="shopLogo" />
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

        </b-container>
        <button type="submit" @click="addArticle">Add article</button>
        <div v-if="hasArticles">
            <div v-for="article in articles" :key="article.id">
             <b-container fluid>
            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Name:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="article.name" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

            <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Description:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="article.description" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>

             <b-row class="my-1">
                <b-col sm="2">
                <label for="input-default">Price:</label>
                </b-col>
                <b-col sm="10">
                <b-form-input v-model="article.price" :disabled="true" id="input-default" placeholder="Enter your name"></b-form-input>
                </b-col>
            </b-row>
        </b-container>
        </div>
        </div>
        <div v-if="!hasArticles">
             <h1>Shop has no articles</h1>
        </div>
        
    </div>
</template>

<script>
    import ShopService from './../services/shops.service';

    export default {
        // eslint-disable-next-line
        beforeRouteEnter(to, from, next) {
            const id = to.params.id;
            ShopService.getShopById(id).then(response => {
                next(onCreateComponent => onCreateComponent.setValues(response, id))
            });
        },
        data() {
            return {
                name: '',
                shopLogo: '',
                createdAt: '',
                hasArticles: false,
                articles: [],
                id: ''
            }
        },
        methods: {
            setValues(values, id) {
                this.id = id;
                const shop = values.response.shop;
                this.name = shop.name;
                this.shopLogo = shop.logo;
                this.createdAt = shop.created_at;
                const articles = values.response.articles;
                this.hasArticles = articles.length !== 0;
                this.articles = articles;
            },
            addArticle() {
                this.$router.push({name: 'CreateArticles', params: { id: this.id}})
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>