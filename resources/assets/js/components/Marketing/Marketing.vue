<script>
    export default {
        props: [
          'marketings', 'statuses', 'statuses_pr'
        ],
        data() {
            return {
                activeCompany: null,
                showKeywords: false,
            }
        },
        methods: {
            selectCompany(company) {
                console.log(company);
                console.log(this.activeCompany);
               if (!this.activeCompany || company.id !== this.activeCompany.id) {
                   this.showKeywords = false;
                   this.$nextTick(() => {
                       this.activeCompany = company;
                       this.showKeywords = true;
                   });
               }
            }
        },
        created() {
            console.log(this.marketings);
        }
    }
</script>