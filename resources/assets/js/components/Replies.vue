<template>
    <div>
        <!--<transition-group class="fade-enter" name="fade" tag="div">-->
        <div v-for="(item, index) in items">
            <reply :data="item" @deleting="deleted(index)"></reply>
        </div>
        <!--</transition-group>-->

        <new-reply :endpoint="endpoint" @created="add"></new-reply>

    </div>

</template>
<script>
    import Reply from './Reply.vue';
    import NewReply from './NewReply.vue';
    export default {
        props: ['data'],
        components: { Reply, NewReply },
        data:function () {
            return {
                items: this.data,
                endpoint: location.pathname + '/replies'

            }
        },
        methods: {

            add: function(reply) {
                this.items.push(reply);
                this.$emit('added');
            },

            deleted: function(index) {
                this.items.splice(index, 1);
                this.$emit('removed');
            }
        }
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .9s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0
    }
</style>