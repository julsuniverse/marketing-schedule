<template>
    <div>
        {{ $marketing->company->company_name }}
    </div>
</template>

<script>
    export default {
        props: ['company_name','marketing_id', 'month', 'year'],
        data() {
            return {
                clicked: false
            }
        },
        methods: {
            click() {
                this.clicked = !this.clicked;
            }
        },
    }
</script>

<style scoped>

</style>