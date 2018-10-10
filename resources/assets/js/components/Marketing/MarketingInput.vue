<template>
    <div @click="click()" class="marketing-cell marketing-cell-input">
        <span v-model="val" v-if="!showInput">{{ val }}</span>
        <input type="text"
               v-model="val"
               v-if="showInput"
               @blur="saveInput()"
               @keypress.enter="saveInput()"
               ref="inp" />
        <div
                v-if="with_difference"
                class="marketing-diff" :class="findColor"> {{ diff }}%</div>
    </div>
</template>

<script>
    export default {
        props: [
            'value', 'field', 'marketing_id', 'difference', 'with_difference'
        ],
        data() {
            return {
                val: this.value,
                showInput: false,
                saving: false,
                diff: this.difference
            }
        },
        methods: {
            click() {
                this.showInput = true;
                this.$nextTick(() => this.$refs.inp.focus());
            },
            hideInput() {
                this.showInput = false;
            },
            saveInput() {
                if(this.val === this.value) {
                    this.hideInput();
                    return;
                }

                if (this.saving) {
                    return;
                }
                this.saving = true;

                $('#spinner').show();
                axios({
                    method: 'POST',
                    url: '/update',
                    data: {
                        'marketing_id': this.marketing_id,
                        'value' : this.val ? this.val : null,
                        'field' : this.field,
                    }
                })
                    .then(response => {
                        if(this.with_difference) {
                            this.diff = response.data;
                        }
                    })
                    .catch(response => {
                        alert('Something went wrong');
                        this.val = null;
                    })
                    .finally(() => {
                        this.saving = false;
                        this.hideInput();
                        $('#spinner').hide();
                    });
            }
        },
        computed: {
            findColor() {
                if(this.diff > 0) {
                    return 'green';
                } else if (this.diff < 0) {
                    return 'red';
                }
            }
        }
    }
</script>