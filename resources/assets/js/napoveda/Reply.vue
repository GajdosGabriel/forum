<template>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading" style="color: #f5ecec;background-color: #81408f; display: flex; justify-content: space-between; align-items: center ">
                <strong v-text="data.user.name"></strong>
                <favorite :data="data"></favorite>

            </div>
                <div v-if="show" class="panel-body">
                    <textarea required v-model="body" class="form-control"></textarea>
                    <button class="btn btn-primary btn-xs" @click="update">update</button>
                    <button class="btn btn-link btn-xs" @click="show=false">späť</button>
                    <button class="btn btn-danger btn-xs" @click="deletereply">Zmazať</button>
                </div>
                <div v-show="!show" class="panel-body" v-text="body">
                </div>

            <div class="panel-body">
                <p class="btn" v-show="!show" @click="show = true"> edit </p>
                <strong class="pull-right" v-text="data.created_at"></strong>
            </div>

        </div>
    </div>

</template>
<script>
    import favorite from './Favorite';
    export default {
        props: ['data'],
        components: { favorite } ,
        data: function() {
            return {

                show: false,
                body: this.data.body

            }
        },
        computed: {

            endpoint: function() {
                return '/replies/' +this.data.id + '/favorites';
            }

        },

        methods: {

            update: function() {
                axios.patch('/replies/' + this.data.id, {
                    body: this.body
                });
                this.show=false;
            },

            deletereply: function(index) {
                axios.delete('/replies/' + this.data.id);
                this.$emit('delete', this.data.id);

//                $(this.$el).fadeOut(300);

            }
        }
    }
</script>