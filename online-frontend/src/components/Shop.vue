<template>
    <div>
        safsaf
        <span>{{name}}</span>
        <span>{{logo}}</span>
    </div>
</template>

<script>
    import ShopService from './../services/shops.service';

    export default {
        // eslint-disable-next-line
        beforeRouteEnter(to, from, next) {
            const id = to.params.id;
            ShopService.getShopById(id).then(response => {
                next(onCreateComponent => onCreateComponent.setValues(response))
            });
        },
        data() {
            return {
                name: '',
                logo: ''
            }
        },
        methods: {
            setValues(values) {
                this.name = values.name;
                this.logo = values.logo;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>