<template>
    <div class="marketing-cell marketing-cell-color" @click="click()" :style="{'background-color' : getColor}">
        <span v-model="current_status" class="marketing-cell-span">{{ getStatusName }}</span>
    </div>
</template>

<script>
    export default {
        props: [
            'value', 'field', 'marketing_id', 'status', 'statuses'
        ],
        data() {
            return {
                val: this.value,
                current_status: this.status
            }
        },
        methods: {
            click() {
                let index = this.getIndex();
                if((Object.keys(this.statuses).length - 1) == index) {
                    this.current_status = this.statuses[0].value;
                } else {
                    this.current_status = this.statuses[index + 1].value;
                }

                this.saveInput();
            },
            getIndex() {
                return _.findIndex(this.statuses, (status) => { return status.value === this.current_status; });
            },
            saveInput() {
                $('#spinner').show();
                axios({
                    method: 'POST',
                    url: '/update-colors',
                    data: {
                        'marketing_id': this.marketing_id,
                        'value' : this.val ? this.val : null,
                        'field' : this.field,
                        'status' : this.current_status
                    }
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
            getStatusName() {
                return this.statuses[this.getIndex()].name;
            },
            getColor() {
                return this.statuses[this.getIndex()].color;
            },
        }
    }
</script>