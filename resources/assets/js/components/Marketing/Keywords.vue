<template>
    <div>
        <span id="open-close"
              @click="click()"
              :class="clicked ? '' : 'open-close-hide'"
        >
            Keywords
            <i class="fa" :class="clicked ? 'fa-angle-down' : 'fa-angle-up'" aria-hidden="true"></i>
        </span>
        <div class="keywords"
             :class="clicked ? '' : 'keywords-hide'"
        >

            <div class="keywords-inner"
                 :class="clicked ? '' : 'keywords-inner-hide'"
            >
                <div class="company-name">{{ activeCompany.company_name }}</div>

                <div class="key" v-for="keyword in keywords">{{ keyword.text }}</div>

                <div class="add">
                    <input v-model="value" name="keyword" placeholder="Enter keyword" />
                    <span class="matches">0</span>
                    <span class="add-keyword"
                        @click="addCompany()"
                    >
                    <i class="fa fa-plus"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['activeCompany', 'month', 'year'],
        data() {
            return {
                clicked : true,
                value: '',
                keywords: this.activeCompany.keywords
            }
        },
        methods: {
            click() {
                this.clicked = !this.clicked;
            },
            addCompany() {
                axios({
                    method: 'POST',
                    url: '/keyword/store',
                    data: {
                        'company_id': this.activeCompany.id,
                        'keyword' : this.value,
                        'month' : this.month,
                        'year': this.year
                    }
                })
                    .then(response => {
                        this.value = '';
                        this.keywords.push(response.data);
                        this.activeCompany.keywords = this.keywords;
                        console.log(response.data);
                    })
                    .catch(response => {
                        alert('Something went wrong');

                    })
                    .finally(() => {
                        //$('#spinner').hide();

                    });
            }
        }
    }
</script>