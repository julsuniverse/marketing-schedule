<template>
    <div>
        <span id="open-close" @click="click()" :class="clicked ? '' : 'open-close-hide'">
            Keywords
            <i class="fa" :class="clicked ? 'fa-angle-down' : 'fa-angle-up'" aria-hidden="true"></i>
        </span>
        <div class="keywords" :class="clicked ? '' : 'keywords-hide'">

            <div class="keywords-inner" :class="clicked ? '' : 'keywords-inner-hide'">
                <div class="company-name">{{ activeCompany.company_name }}</div>
                <div class="key" v-for="keyword in filterShow" :class="highlight(keyword)">
                    <input type="checkbox" :checked="keyword.pivot.completed" @change="complete(keyword)"/>
                    <span class="keywords-text">
                        {{ keyword.text }}
                        ({{ keyword.pivot.count }})
                    <span @click="deleteKeyword(keyword)">
                        <i class="fa fa-close"></i>
                    </span>
                    </span>

                </div>

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
                            id="keyword-input"
                            v-model="value"
                            @keypress="current_page = 1"
                            name="keyword"
                            placeholder="Enter keyword"
                            autofocus
                            ref="key"
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
                per_page: 11,
                current_page: 1,
                matches: 0
            }
        },
        methods: {
            click() {
                this.clicked = !this.clicked;
            },
            addCompany() {
                if(this.activeButton == 'disabled') {
                    return;
                }
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
                            this.keywords.unshift(new_keywords); //вставить в начало
                        }
                        this.activeCompany.keywords = this.keywords;
                        $(this.$refs.key).focus();
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
            complete(keyword) {
                axios({
                    method: 'POST',
                    url: '/keyword/edit',
                    data: {
                        'completed': !keyword.pivot.completed,
                        'keyword': keyword.id,
                        'company': keyword.pivot.company_id,
                        'month': this.month,
                        'year': this.year
                    }
                })
                    .then(response => {
                        let index = _.findIndex(this.keywords, function(k) { return k.id === keyword.id; });
                        this.keywords[index].pivot.completed = !keyword.pivot.completed;
                        this.activeCompany.keywords = this.keywords;
                    })
                    .catch(response => {
                        alert('Something went wrong');
                    })
            },
            deleteKeyword(keyword) {
                axios({
                    method: 'POST',
                    url: '/keyword/delete',
                    data: {
                        'keyword': keyword.id,
                        'company': keyword.pivot.company_id,
                        'month': this.month,
                        'year': this.year
                    }
                })
                    .then(response => {
                        this.keywords = this.keywords.filter((kw) => {
                           return kw.id !== keyword.id;
                        });
                        this.activeCompany.keywords = this.keywords;
                    })
                    .catch(response => {
                        alert('Something went wrong');
                    })
            },
            highlight(keyword) {
                return keyword.pivot.month == this.month && keyword.pivot.year == this.year ? 'keywords-background' : '';
            }
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
            },
            activeButton() {
                return this.value.length === 0 ? 'disabled' : '';
            }
        },
        mounted() {
            //
        }
    }
</script>