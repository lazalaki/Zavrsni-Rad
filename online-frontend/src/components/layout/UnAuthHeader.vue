<template>
    <div>
        <b-nav-item @click="AllShopsPage">Shops</b-nav-item>
        <b-nav-item @click="goToLogin">Login</b-nav-item>
        <b-nav-item @click="goToRegistration">Register</b-nav-item>
    </div>
</template>

<script>
    export default {
        methods: {
        goToLogin() {
            return this.$router.push({name: 'Login'})
        },

        goToRegistration() {
            return this.$router.push({name: 'Registration'})
        },

        AllShopsPage() {
                this.$router.push({ name: 'AllShops'})
        },
    }
}
</script>

<style lang="css" scoped>
    div {
        display: flex;
        flex-direction: row;
    }
</style>