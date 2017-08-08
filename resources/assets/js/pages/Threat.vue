<script>
    import { eventBus }from '../app.js';
    import Replies from '../components/Replies.vue';
    export default {
        props: ['initialRepliesCount'],
        components: { Replies },

        data: function() {
            return {
                repliesCount: this.initialRepliesCount,
                displayTitle: true,
                displayComments: true

            }
        },

        methods: {
            offTitle:function() {
                eventBus.$emit('displayTitle', this.displayTitle );
                this.displayTitle = !this.displayTitle;
            }
        }

    }
</script>
<style>
.bublina {
    position: fixed;
    right: 0px;
    top: 58px;
}
</style>