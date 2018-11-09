<template>
    <div>
        <button class="btn btn-info btn-xs" @click="click()" :class="disabledClass" :disabled="disabled">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </button>
        <button class="btn btn-primary btn-xs" @click="clickAdmin()">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
        </button>
    </div>
</template>

<script>
    export default {
        props: [
            'marketing_id', 'company_email'
        ],
        data() {
            return {

            }
        },
        methods: {
            click() {
                $('#spinner').show();
                console.log('marketing_id', this.marketing_id);

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
            },
            clickAdmin() {
                $('#spinner').show();
                console.log('marketing_id', this.marketing_id);

                axios({
                    method: 'POST',
                    url: '/report/' + this.marketing_id + '/1'
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
        },
        computed: {
            disabled() {
                return (this.company_email == '') ? 'disabled' : false;
            },
            disabledClass() {
                return (this.company_email == '') ? 'disabled-gray' : '';
            }
        }
    }
</script>