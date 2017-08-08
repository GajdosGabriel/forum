<template>

    <div class="col-md-8">

        <div class="panel panel-default">
            <div v-show="titleshow" class="panel-heading" style="color: #f5ecec;background-color: #81408f; display: flex; justify-content: space-between; align-items: center ">
                <strong>#{{ data.id }} {{ data.user.name }}</strong>
                <favorite :data="data"></favorite>

            </div>
            <div v-if="show" class="panel-body">
                <textarea required v-model="body" class="form-control"></textarea>
                <!--<button class="btn btn-primary btn-xs" @click="update">update</button>-->
                <button class="btn btn-link btn-xs" @click="show=false">späť</button>
                <button class="btn btn-danger btn-xs" @click="deleted">Zmazať</button>
            </div>

            <div v-show="!show" class="panel-body" v-text="body">

            </div>

            <div class="panel-body">
                <p class="btn" v-show="!show" @click="show = true"> edit </p>
                <strong class="pull-right" v-text="data.TimeForHuman"></strong>
            </div>

        </div>

    </div>
</template>

<script>
    import { eventBus }from '../app.js';
    import Favorite from './Favorites.vue';
    export default {
        props: ['data'],
        components: { Favorite },
        data: function() {
            return {
                body: this.data.body,
                show: false,
                titleshow: true

            }
        },

        created: function() {

            eventBus.$on('displayTitle', (data)=> {
                this.titleshow = ! this.titleshow;
            });

        },

        methods: {
            deleted: function() {
                axios.delete('/replies/' + this.data.id);
//                $(this.$el).fadeOut(300);
                this.$emit('deleting', this.data.id);

            }
        }
    }
</script>

<style>

</style>