<template>
    <button @click="addLike" class="btn btn-primary" > {{ count }} Hlasovať</button>
</template>
<script>
    export default {
        props: ['data'],
        data: function() {
            return {
                count: this.data.FavoritesCount,
                offDisables: false

            }
        },

        computed: {

            endpoint: function() {
                return '/replies/' +this.data.id + '/favorites';
            }



        },

        methods: {
            addLike: function() {
                axios.post(this.endpoint);
                this.count++;
            }
        }
    }
</script>