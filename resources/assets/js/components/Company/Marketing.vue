<template>
    <span class="btn btn-xs btn-action" :class="button_class" @click="changeMarketing()">{{ text }}</span>
</template>

<script>
    export default {
        props: [
            'company_id', 'marketing'
        ],
        data() {
            return {
                value: this.marketing
            }
        },
        methods: {
            changeMarketing() {
                this.changeValue();
                axios({
                    method: 'POST',
                    url: 'company/change-marketing',
                    data: {
                        'company_id': this.company_id,
                        'marketing': this.value,
                    }
                })
                    .then(response => {

                    })
                    .catch(response => {
                        alert('Something went wrong');
                    })

            },
            changeValue() {
                this.value = (this.value === 1) ? 0 : 1;
            }
        },
        computed: {
            text() {
                if (this.value === 1) {
                    return "ON";
                }

                return "OFF";
            },
            button_class() {
                if (this.value === 1) {
                    return "btn-primary";
                }

                return "btn-danger";
            }
        }
    }
</script>