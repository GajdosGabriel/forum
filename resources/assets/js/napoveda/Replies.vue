<template>

    <div>
        <div v-for="(reply, index) in items">
            <reply :data="reply" @delete="remove(index)"></reply>
        </div>

        <newReply :endpoint="endpoint" @created="add"></newReply>

    </div>

</template>

<script>
    import reply from './Reply.vue';
    import newReply from './../components/NewReply.vue';
    export default {
        props: ['data'],
        components: { reply, newReply },
        data: function() {
            return {
                items: this.data,
                endpoint: location.pathname + '/replies'
            }
        },

        methods: {
            add: function(reply) {
                this.items.push(reply);
            },

            remove: function(index) {
                this.items.splice(index);
            }
        }
    }
</script>