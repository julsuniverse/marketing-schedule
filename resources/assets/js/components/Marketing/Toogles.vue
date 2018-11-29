<template>
    <div>
        <span id="google" class="btn btn-xs btn-action" :class="button_class(google_value)" @click="changeGoogle()"><i class="fa fa-google" aria-hidden="true"></i> {{ text(google_value) }}</span>
        <span id="email" class="btn btn-xs btn-action" :class="button_class(email_value)" @click="changeEmail()"> <i class="fa fa-envelope" aria-hidden="true"></i> {{ text(email_value) }}</span>
        <span id="review" class="btn btn-xs btn-action" :class="button_class(review_value)" @click="changeReview()"><i class="fa fa-comments-o" aria-hidden="true"></i> {{ text(review_value) }}</span>
    </div>
</template>

<script>
    export default {
        props: [
            'marketing_id', 'google', 'email', 'review'
        ],
        data() {
            return {
                google_value: this.google,
                email_value : this.email,
                review_value: this.review,

                type_google: 'google',
                type_email: 'email',
                type_review: 'review',
            }
        },
        methods: {
            changeGoogle() {
                this.changeValue(this.type_google);
                axios({
                    method: 'POST',
                    url: 'marketing/change-toogle',
                    data: {
                        'marketing_id': this.marketing_id,
                        'type': 'google',
                        'value': this.google_value,
                    }
                })
                    .catch(response => {
                        alert('Something went wrong');
                    })

            },
            changeEmail() {
                this.changeValue(this.type_email);
                axios({
                    method: 'POST',
                    url: 'marketing/change-toogle',
                    data: {
                        'marketing_id': this.marketing_id,
                        'type': 'email',
                        'value': this.email_value,
                    }
                })
                    .catch(response => {
                        alert('Something went wrong');
                    })
            },
            changeReview() {
                this.changeValue(this.type_review);
                axios({
                    method: 'POST',
                    url: 'marketing/change-toogle',
                    data: {
                        'marketing_id': this.marketing_id,
                        'type': 'review',
                        'value': this.review_value,
                    }
                })
                    .then(response => {

                    })
                    .catch(response => {
                        alert('Something went wrong');
                    })
            },
            changeValue(toogle) {
                if(toogle == this.type_google) {
                    this.google_value = !this.google_value;

                }
                if(toogle == this.type_email) {
                    this.email_value = (this.email_value === 1) ? 0 : 1;
                }
                if(toogle == this.type_review) {
                    this.review_value = (this.review_value === 1) ? 0 : 1;
                }
            },
            text(value) {
                if (value) {
                    return "ON";
                }
                return "OFF";
            },
            button_class(value) {
                if (value) {
                    return "btn-success";
                }
                return "disabled-gray";
            }
        }
    }

</script>