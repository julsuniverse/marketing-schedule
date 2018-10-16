<template>
    <div>
        <span id="open-close" @click="click()" :class="clicked ? '' : 'open-close-hide'">
            Keywords
            <i class="fa" :class="clicked ? 'fa-angle-down' : 'fa-angle-up'" aria-hidden="true"></i>
        </span>
        <div class="keywords" :class="clicked ? '' : 'keywords-hide'">

            <div class="keywords-inner" :class="clicked ? '' : 'keywords-inner-hide'">
                <div class="company-name">{{ activeCompany.company_name }}</div>
                <div class="key" v-for="keyword in filterShow">{{ keyword.text }} ({{ keyword.pivot.count }})</div>

                <nav aria-label="Page navigation" class="keywords-pagination">
                    <ul class="pagination">
                        <li v-for="(i) in countPages" @click="changeCurrentPage(i)">
                            <a href="javascript:void(0)">
                                {{ i }}
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="add">
                    <input
                            type="text"
                            v-model="value"
                            @keypress="current_page = 1"
                            name="keyword"
                            placeholder="Enter keyword"
                    />
                    <span class="matches">{{ matches }}</span>
                    <span class="add-keyword" @click="addCompany()">
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
                clicked: true,
                value: '',
                keywords: this.activeCompany.keywords,
                per_page: 12,
                current_page: 1,
                matches: 0
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
                        'keyword': this.value,
                        'month': this.month,
                        'year': this.year
                    }
                })
                    .then(response => {
                        this.value = '';
                        let new_keywords = response.data.keywords[0];
                        let index = _.findIndex(this.keywords, function(keyword) { return keyword.id == new_keywords.id; });
                        if(index != -1) {
                            this.keywords[index] = new_keywords;
                        } else {
                            this.keywords.push(new_keywords);
                        }
                        this.activeCompany.keywords = this.keywords;
                    })
                    .catch(response => {
                        alert('Something went wrong');

                    })
                    .finally(() => {
                        //$('#spinner').hide();

                    });
            },
            changeCurrentPage(page) {
                this.current_page = page;
            },
        },
        computed: {
            filtered() {
                return this.keywords.filter((keyword, index) => {
                    return keyword.text.indexOf(this.value) !== -1;
                })
            },
            countPages() {
                return Math.ceil(Object.keys(this.filtered).length / this.per_page);
            },
            filterShow() {
                let keywords =  this.filtered.filter((keyword, index) => {
                    if (
                        !((index > (this.per_page * (this.current_page - 1) - 1)) &&
                            (index < this.per_page * this.current_page))
                    ) {
                        return false;
                    }
                    return true;
                });
                if(Object.keys(keywords).length === 1) {
                    this.matches = keywords[0].pivot.count;
                } else {
                    this.matches = 0;
                }
                return keywords;
            }
        }
    }
</script>