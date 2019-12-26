<template>
    <div>
        <h1>Glavna stranica- Sve radnje</h1>
    </div>
</template>

<script>
    export default {
        /* eslint-disable no-console */
        mounted() {
            console.log(this.$store.getters.isLoggedIn);
        }
    }
</script>

<style lang="scss" scoped>

</style>