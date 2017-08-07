<script>
    import Replies from '../components/Replies.vue';
    export default {
        props: ['initialRepliesCount'],
        components: { Replies },

        data: function() {
            return {
                repliesCount: this.initialRepliesCount

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