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
               if (!this.activeCompany || company.id !== this.activeCompany.id) {
                   this.showKeywords = false;
                   this.$nextTick(() => {
                       this.activeCompany = company;
                       this.showKeywords = true;
                   });
               }
            },
            getBackground(marketing) {
                return this.activeCompany && marketing.company_id == this.activeCompany.id ? '#f5f5f5' : '#fff';
            }
        }
    }
</script>