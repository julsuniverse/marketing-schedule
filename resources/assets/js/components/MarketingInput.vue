<template>
    <div @click="click()" class="marketing-cell">
        <span v-model="val" v-if="!showInput">{{ val }}</span>
        <input type="text"
               v-model="val"
               v-if="showInput"
               @blur="saveInput()"
               @keypress.enter="saveInput()"
               ref="inp" />
    </div>
</template>

<script>
    export default {
        props: [
            'value', 'field', 'marketing_id'
        ],
        data() {
            return {
                val: this.value,
                showInput: false,
                saving: false
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
                        'company_id' : this.company_id
                    }
                })
                    .then(response => {
                        this.value = this.val;
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
    }
</script>