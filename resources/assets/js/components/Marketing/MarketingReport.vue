<template>
    <button class="btn btn-info btn-xs" @click="click()">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
    </button>
</template>

<script>
    export default {
        props: [
            'marketing_id'
        ],
        data() {
            return {

            }
        },
        methods: {
            click() {
                $('#spinner').show();

                axios({
                    method: 'POST',
                    url: '/report/' + this.marketing_id
                })
                    .then(response => {

                    })
                    .catch(response => {
                        alert('Something went wrong');
                    })
                    .finally(() => {
                        $('#spinner').hide();
                    });
            }
        }
    }
</script>