<script>
    export default {
        data() {
            return {
                activeCompany: null,
                showKeywords: false,
            }
        },
        methods: {
            selectCompany(id) {
               if (id !== this.activeCompany) {
                   this.showKeywords = false;
                   this.$nextTick(() => {
                       this.activeCompany = id;
                       this.showKeywords = true;
                   });
               }
            }
        }
    }
</script>